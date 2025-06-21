<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\TicketOrder;
use App\Models\TicketDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TicketOrderController extends Controller
{
   public function pemesanan(Request $request)
{
    $search = $request->input('search');
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    $query = TicketOrder::with(['concert', 'details'])->latest();

    // 🔍 Filter pencarian
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('id', 'like', "%{$search}%")
              ->orWhere('nama_pemesan', 'like', "%{$search}%")
              ->orWhereHas('details', function ($subQuery) use ($search) {
                  $subQuery->where('ticket_code', 'like', "%{$search}%");
              });
        });
    }

    // 📅 Filter tanggal
    if ($startDate && $endDate) {
        $query->whereBetween('created_at', [
            $startDate . ' 00:00:00',
            $endDate . ' 23:59:59',
        ]);
    } elseif ($startDate) {
        $query->whereDate('created_at', '>=', $startDate);
    } elseif ($endDate) {
        $query->whereDate('created_at', '<=', $endDate);
    }

    // 📄 Pagination (tetap bawa query string filter)
    $pesanan = $query->paginate(10)->appends($request->query());

    return view('ticket.pemesanan', compact('pesanan'));
}


    public function pemesanan_user(Request $request)
    {
        $search = $request->input("search");
        $startDate = $request->input("start_date");
        $endDate = $request->input("end_date");

        // Ambil ID user yang sedang login
        $userId = Auth::id();

        // Filter berdasarkan user_id
        $query = TicketOrder::with(["concert", "details"])
            ->where("user_id", $userId) // ✅ Tambahkan ini
            ->latest();

        // Filter search
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where("id", "like", "%$search%")
                    ->orWhere("nama_pemesan", "like", "%$search%")
                    ->orWhereHas("details", function ($q) use ($search) {
                        $q->where("ticket_code", "like", "%$search%");
                    });
            });
        }

        // Filter date range
        if ($startDate && $endDate) {
            $query->whereBetween("created_at", [
                $startDate . " 00:00:00",
                $endDate . " 23:59:59",
            ]);
        } elseif ($startDate) {
            $query->whereDate("created_at", ">=", $startDate);
        } elseif ($endDate) {
            $query->whereDate("created_at", "<=", $endDate);
        }

        $pesanan = $query->paginate(10)->appends($request->query());

        return view("ticket.pemesanan_user", compact("pesanan"));
    }

    public function index(Request $request)
    {
        $query = Concert::query();

        // Filter by search (title/location)
        if ($request->has("search")) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where("judul", "like", "%$search%")->orWhere(
                    "lokasi",
                    "like",
                    "%$search%"
                )->orWhere(
                    "artis",
                    "like",
                    "%$search%"
                );
            });
        }

        // Filter by category
        if ($request->has("kategori") && $request->kategori != "") {
            $query->where("kategori", $request->kategori);
        }

        // Filter by date range
        if ($request->has("start_date") && $request->start_date != "") {
            $query->whereDate("waktu", ">=", $request->start_date);
        }

        if ($request->has("end_date") && $request->end_date != "") {
            $query->whereDate("waktu", "<=", $request->end_date);
        }

        // Get categories for filter dropdown
        $categories = Concert::distinct()->pluck("kategori");

        $concerts = $query->latest()->paginate(10);

        return view("ticket.index", compact("concerts", "categories"));
    }
    public function create(Concert $concert)
    {
        $concert = \App\Models\Concert::all();
        return view("ticket.create", compact("concert"));
    }

    public function showDetail($id)
    {
        $order = TicketOrder::with(["details", "concert"])->findOrFail($id);
        return view("ticket.detail", compact("order"));
    }
    public function updateStatus($id)
    {
        $ticketDetail = TicketDetail::findOrFail($id);
        $ticketDetail->update(["is_used" => !$ticketDetail->is_used]);

        return back()->with("success", "Status tiket berhasil diperbarui");
    }

    public function store(Request $request, Concert $concert)
    {
        $validated = $request->validate([
            "jumlah_tiket" => "required|integer|min:1|max:5",
        ]);

        $user = Auth::user();
        $jumlahTiket = $validated["jumlah_tiket"];
        $totalHarga = $concert->harga * $jumlahTiket;

        // Buat order tiket
        $order = TicketOrder::create([
            "user_id" => $user->id,
            "concert_id" => $concert->id,
            "nama_pemesan" => $user->name,
            "email" => $user->email,
            "jumlah_tiket" => $jumlahTiket,
            "total_harga" => $totalHarga,
        ]);

        // Buat detail tiket sebanyak jumlah yang dipesan
        for ($i = 0; $i < $jumlahTiket; $i++) {
            $ticketCode = strtoupper(substr(md5(uniqid()), 0, 5)); // Generate 5 digit kode unik

            TicketDetail::create([
                "ticket_order_id" => $order->id,
                "ticket_code" => $ticketCode,
            ]);
        }

        $concert->decrement("kuota", $jumlahTiket);

        return redirect()
            ->route("pemesanan_user.index", $concert)
            ->with("success", "Tiket berhasil dipesan!");
    }
}