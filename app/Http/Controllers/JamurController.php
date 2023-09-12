<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panen;
use App\Models\Penjualan;
use File;
use DB;

class JamurController extends Controller
{
    //


	public function panen_index()
	{

		$panen = Panen::orderBy('id', 'DESC')->paginate(100);

		return view('panen.index', compact('panen'));
	}

	public function panen_add(Request $request){


		$data_add = new Panen();

		$data_add->hari_panen = $request->input('hari_panen');
		$data_add->tanggal_panen = $request->input('tanggal_panen');
		$data_add->jam_panen = $request->input('jam_panen');
		$data_add->berat_panen = $request->input('berat_panen');
		$data_add->status_penjualan = 'pending';
		
		
		$data_add->save();

		return redirect()->back()->with('success', 'Data Panen Baru Berhasil Ditambahkan');
	}



	public function panen_delete($id)
	{
		$delete = Panen::findOrFail($id);
		$delete->delete();

		return redirect()->back()->with('success', 'Data Berhasil Dihapus');
	}


	// ================================================================================================================================

	public function penjualan_index()
	{	
		$penjualan = DB::table('penjualans')
		->join('panens' , 'penjualans.id_panen', '=' , 'panens.id')
		->select('penjualans.*','panens.tanggal_panen','panens.berat_panen')
		->orderBy('penjualans.id','DESC')
		->paginate(100);

		// $penjualan = Penjualan::orderBy('id', 'DESC')->get();
		$data_panen = Panen::orderBy('id', 'DESC')->where('status_penjualan','pending')->get();
		// return $data_panen;
		return view('penjualan.index', compact('penjualan','data_panen'));
	}

	public function penjualan_add(Request $request){


		$data_add = new Penjualan();

		$data_add->id_panen = $request->input('id_panen');
		$data_add->nominal = $request->input('nominal');
		$data_add->tanggal = $request->input('tanggal');
		
		// return $data_add;
		
		$data_add->save();

		$data_update = Panen::where('id', $data_add->id_panen)->first();

		$input = [
			'status_penjualan' => 'terjual',

		];

		$data_update->update($input);

		return redirect()->back()->with('success', 'Data Penjualan Baru Berhasil Ditambahkan');
	}


	public function penjualan_delete($id)
	{
		$delete = Penjualan::findOrFail($id);
		$data_update = Panen::where('id', $delete->id_panen)->first();

		$input = [
			'status_penjualan' => 'pending',
		];

		$data_update->update($input);
		$delete->delete();

		return redirect()->back()->with('success', 'Data Berhasil Dihapus');
	}

	// ==============================================================================================================================

	public function laporan_index(Request $request)
	{

		$from = $request->from;
		$to = $request->to;

		if ($from == null && $to == null) {
			$laporan = DB::table('penjualans')
			->join('panens' , 'penjualans.id_panen', '=' , 'panens.id')
			->select('penjualans.*','panens.tanggal_panen','panens.berat_panen')
			->orderBy('penjualans.id','DESC')
			->paginate(100);

			$total_nominal = Penjualan::sum('nominal');
			$total_berat = DB::table('penjualans')
			->join('panens' , 'penjualans.id_panen', '=' , 'panens.id')
			->select('penjualans.*id','panens.berat_panen')
			->orderBy('penjualans.id','DESC')
			->sum('panens.berat_panen');
		}else{

		$laporan = DB::table('penjualans')
		->join('panens' , 'penjualans.id_panen', '=' , 'panens.id')
		->select('penjualans.*','panens.tanggal_panen','panens.berat_panen')
		->orderBy('penjualans.id','DESC')
		->whereBetween('penjualans.tanggal', [$from, $to])
		->paginate(100);

			$total_nominal = Penjualan::whereBetween('tanggal', [$from, $to])->sum('nominal');
			$total_berat = DB::table('penjualans')
			->join('panens' , 'penjualans.id_panen', '=' , 'panens.id')
			->select('penjualans.*id','panens.berat_panen')
			->orderBy('penjualans.id','DESC')
			->whereBetween('penjualans.tanggal', [$from, $to])
			->sum('panens.berat_panen');
		}



		return view('laporan.index', compact('laporan','from','to','total_nominal','total_berat'));
	}
}
