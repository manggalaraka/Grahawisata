<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use App\Model\M_kelas_kamar;
use App\Model\M_kamar;
use App\Model\M_relasi_fasilitas;
use App\Model\M_fasilitas;
use App\Model\M_promo;
use App\Model\M_order;
use App\Model\M_pengunjung;
use App\Model\M_detail_reservasi;
use View;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('revalidate');
        $this->middleware('LayoutType');
    }

    protected $layout = 'layouts.MasterAdm';
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['MainTitle'] = "Halaman Dashboard";
        $data['FormTitle'] = " System GrahaWisata";
        $data['LayoutType'] = $request->get('layout');
        $data['PluginJS'] = null;
        $data['SupportJS'] = null;
        $data['ContentSupport'] = null;
       // $data['MainJS'] = View::make('header_footer.FooterAdm')->with($data);
        return View::make('content.VContentDash')->with($data);
    }

    protected function tes1(){
        echo "tes1";
    }
    protected function tes2(){
        echo "tes2";
    }
    protected function tes3(){
        echo "tes3";
    }


////////////////////////////////////////////////// FASILITAS /////////////////////////////////////////////////////////

    public function daftar_fasilitas(Request $request)
    {   
        $key_fasilitas = $request->search_fasilitas;
        // $maindata = M_fasilitas::where('is_delete', 'no');
        if(empty($key_fasilitas) || $key_fasilitas == null){
            $maindata = M_fasilitas::paginate(5);
        }else{
            $maindata =M_fasilitas::where('nama_fasilitas','LIKE',"%{$key_fasilitas}%")->paginate(5);
        }
         $data['MainTitle'] = "Grahawisata - Fasilitas Hotel";
         $data['FormTitle'] = "Daftar Fasilitas";
         $data['LayoutType'] = $request->get('layout');
         // $data['maindata'] = M_fasilitas::get()->where('is_delete', 'no');
         $data['maindata'] = $maindata;
         $data['keyword'] = $key_fasilitas;
         $data['PluginJS'] = null;
         $data['SupportJS'] = View::make('function_js.custom_list_fasilitas')->with($data);
         $data['ContentSupport'] = View::make('modal.modal_fasilitas')->with($data);
         return View::make('content.VContentListFasilitas')->with($data);
    }


    public function data_fasilitas($id){
        $all_fasilitas = M_fasilitas::all();
        $maindata = M_kelas_kamar::where('id_kelas',$id)->get();

        foreach ($maindata as $hasil) {

            foreach($all_fasilitas as $fasilitas){
                $data_fasilitas[] = array('id_fasilitas'=>$fasilitas->id_fasilitas,
                                'nama_fasilitas'=>$fasilitas->nama_fasilitas,
                                'hasil'=>false);
            }

        for($i=0; $i<count($data_fasilitas); $i++){    
                foreach($hasil->fasilitas as $fasilitas_pilihan){
                    if($fasilitas_pilihan->id_fasilitas == $data_fasilitas[$i]['id_fasilitas']){
                        $data_fasilitas[$i]['hasil'] = true;
                    }
                }  
        }


        }
   
        return $data_fasilitas;
    } 
////////////////////////////////////////////////// FASILITAS /////////////////////////////////////////////////////////




////////////////////////////////////////////////// KELAS KAMAR /////////////////////////////////////////////////////////

    protected function daftar_kelas(Request $request){
        $key_kelas = $request->search_kelas;
        if(empty($key_kelas) || $key_kelas == null){
            $maindata = M_kelas_kamar::paginate(5);
        }else{
            $maindata =M_kelas_kamar::where('nama','LIKE',"%{$key_kelas}%")->paginate(5);
        }
         $data['jumlah_kamar'] =  M_kamar::count();
         $data['kamar_kosong'] =  M_kamar::where('status','kosong');
         $data['kamar_dipakai'] =  M_kamar::where('status','dipakai');
         $data['MainTitle'] = "Grahawisata - Kelas Kamar Hotel";
         $data['FormTitle'] = "Daftar Kelas Kamar";
         $data['LayoutType'] = $request->get('layout');
         $data['maindata'] = $maindata;
         $data['keyword'] = $key_kelas;
         $data['PluginJS'] = null;
         $data['SupportJS'] = View::make('function_js.custom_list_kamar')->with($data);
         $data['ContentSupport'] = View::make('modal.modal_kamar')->with($data);
         return View::make('content.VContentListKelasKamar')->with($data);

    }  

    public function tambah_kelas(Request $request)
    {
         $data['MainTitle'] = "Grahawisata - Kelas Kamar";
         $data['FormTitle'] = "Tambah Kelas Kamar";
         $data['LayoutType'] = $request->get('layout');
         $data['fasilitas'] =  M_fasilitas::all();
         $data['PluginJS'] = null;
         $data['SupportJS'] = View::make('function_js.custom_list_kelaskamar')->with($data);
         $data['ContentSupport'] = null;
         return View::make('content.VContentAddKelasKamar')->with($data);
    }


    public function edit_kelas(Request $request,$id_kelas)
    {
         $maindata = M_kelas_kamar::where('id_kelas',$request->id_kelas);
         $data['MainTitle'] = "Grahawisata - Kelas Kamar";
         $data['FormTitle'] = "Edit Kelas Kamar";
         $data['LayoutType'] = $request->get('layout');
         $data['maindata'] = $maindata->get();
         $data['key'] = $request->id_kelas;
         $data['fasilitas'] =  $this->data_fasilitas($id_kelas);
         $data['PluginJS'] = null;
         $data['SupportJS'] = View::make('function_js.custom_list_kelaskamar')->with($data);
         $data['ContentSupport'] = null;

         if( $maindata->count() == 1) {
            return View::make('content.VContentEditKelasKamar')->with($data);
         }else{
            return redirect('/home/daftar_kelas')->with('error_notif', "Data Yang Akan di Edit Tidak Ditemukan");
         }
    }      

////////////////////////////////////////////////// KELAS KAMAR /////////////////////////////////////////////////////////



 
//////////////////////////////////////////////////////// PROMO /////////////////////////////////////////////////////////
    public function daftar_promo(Request $request){
        $key_promo = $request->search_promo;
        if(empty($key_promo) || $key_promo == null){
            $maindata = M_promo::paginate(5);
        }else{
            // $maindata = M_promo::paginate(5);
            $maindata = M_promo::where('kode_promo','LIKE',"%{$key_promo}%")->paginate(5);
        }
         $data['MainTitle'] = "Grahawisata - Promo Hotel";
         $data['FormTitle'] = "Daftar Promo";
         $data['LayoutType'] = $request->get('layout');
         $data['maindata'] = $maindata;
         $data['keyword'] = $key_promo;
         $data['PluginJS'] = null;
         $data['SupportJS'] = View::make('function_js.custom_list_promo')->with($data);
         $data['ContentSupport'] = View::make('modal.modal_promo')->with($data);
         return View::make('content.VContentListPromo')->with($data);

    }  

//////////////////////////////////////////////////////// PROMO /////////////////////////////////////////////////////////





//////////////////////////////////////////////////////// KEUANGAN ///////////////////////////////////////////////////////// 

    public function pemasukan(Request $request,$parameter){
        $keyword = $request->key_pemasukan;
        // $param_tahun = $request->tahun;
        // $param_bulan = $request->bulan;
        // $param_hari = $request->hari;
        // $param_date_between = $request->tanggal_between;

        // if(empty($key_kelas) || $key_kelas == null){
        //     $maindata = M_kelas_kamar::paginate(5);
        // }else{
        //     $maindata =M_kelas_kamar::where('nama','LIKE',"%{$key_kelas}%")->paginate(5);
        // }
        //  $data['jumlah_kamar'] =  M_kamar::count();
        //  $data['kamar_kosong'] =  M_kamar::where('status','kosong');
        //  $data['kamar_dipakai'] =  M_kamar::where('status','dipakai');
         if($parameter=="tahunan"){
            $param_tahun = $request->tahun;
            $maindata = $this->pemasukan_tahunan($keyword,$param_tahun);
         }else if($parameter=="bulanan"){
            $param_bulan = $request->bulan;
            $maindata = $this->pemasukan_bulanan($keyword,$param_bulan);
         }else if($parameter=="harian"){
            $param_hari = $request->hari;
            $maindata = $this->pemasukan_harian($keyword,$param_hari);
         }else{
            $param_date_between = $request->tanggal_between;
            $maindata = $this->pemasukan_all($keyword,$param_date_between);
         }

         $data['MainTitle'] = "Grahawisata - Pemasukan Hotel";
         $data['FormTitle'] = "Data Pemasukan Hotel";
         $data['LayoutType'] = $request->get('layout');
         $data['maindata'] = $maindata;
        //  $data['keyword'] = $key_kelas;
         $data['PluginJS'] = null;
         $data['SupportJS'] = null;
         $data['ContentSupport'] = null;
         return View::make('content.VContentPemasukan')->with($data);
        
    }

    public function pemasukan_all($keyword, $parameter){
        if(empty($keyword) and !empty($parameter)){

        }else if(!empty($keyword) and empty($parameter)){

        }else if(!empty($keyword) and !empty($parameter)){

        }else{
             $maindata =M_order::with('detail_reservasi','pengunjung')->paginate(5);
             return $maindata;
        }

    }

    public function pemasukan_tahunan($keyword, $parameter){

    }

    public function pemasukan_bulanan($keyword, $parameter){

    }

    public function pemasukan_harian($keyword, $parameter){

    }


    public function pengeluaran(Request $request){
         return View::make('content.VContentPengeluaran')->with($data);

    }

    public function neraca(Request $request){
         return View::make('content.VContentNeracaKeuangan')->with($data);
    }


//////////////////////////////////////////////////////// KEUANGAN ///////////////////////////////////////////////////////// 






//////////////////////////////////////////////////////// PESANAN ///////////////////////////////////////////////////////// 
    public function pesan_kamar(Request $request){
        $key_promo = $request->search_promo;
        if(empty($key_promo) || $key_promo == null){
            $maindata = M_kamar::paginate(5);
        }else{
            $maindata = M_kamar::paginate(5);
        }
         $data['MainTitle'] = "Grahawisata - Pesan Kamar";
         $data['FormTitle'] = "Pemesanan Kamar";
         $data['LayoutType'] = $request->get('layout');
         $data['maindata'] = $maindata;
         $data['keyword'] = $key_promo;
         $data['PluginJS'] = null;
         $data['SupportJS'] = null;
         $data['ContentSupport'] = null;
         return View::make('content.VContentCariKamar')->with($data);

    }  

    public function search_kamar(Request $request){
        $waktu_start =$request->get('waktu')." 14:00:00";
        $durasi = $request->get('durasi');
        $waktu_end = date('d-m-Y',strtotime($waktu_start.' + '.$durasi.' days'))." 12:00:00";
        $kamar = $request->get('kamar');
        $guest = $request->get('guest');
        $validate_guest_kamar = $this->validateGuestKamar($guest,$kamar);
        $day_start = $this->validateDate($waktu_start);
        $day_end = $this->validateDate($waktu_end);
        
        $parameter = array('day_start'=>$day_start,
                           'day_end'=>$day_end,
                           'durasi'=>$durasi,
                           'kamar'=>$kamar,
                           'guest'=>$guest,
                           'validate_guest_kamar'=>$validate_guest_kamar);

        if(($day_start) and ($day_end) and ($validate_guest_kamar) and $day_start<$day_end){
            $order_detail = M_detail_reservasi::whereBetween('tanggal' ,array($day_start->format('Y-m-d H:i:s'),$day_end->format('Y-m-d H:i:s')))->get()->pluck('id_kamar');
            $kamar_exception = array();
            foreach($order_detail as $hasil){
                    if(!in_array($hasil, $kamar_exception)){
                         array_push($kamar_exception, $hasil);
                    }
            }  
            // echo json_encode($kamar_exception);
            // exit();
            // $avail_kamar = M_kamar::whereNotIn('id_kamar',$kamar_exception)->get()->pluck('id_kamar');
            $avail_kamar = M_kamar::whereNotIn('id_kamar',$kamar_exception)->get();
            $jml_avail_kamar_bykelas = array_count_values( M_kamar::whereNotIn('id_kamar',$kamar_exception)->get()->pluck('id_kelas')->toArray());

                $avail_kelas = array_values(array_unique( M_kamar::whereNotIn('id_kamar',$kamar_exception)
                                            ->get()
                                            ->pluck('id_kelas')
                                            ->toArray() ));
                $kelas= M_kelas_kamar::findMany($avail_kelas);
                
                $available = array();
                foreach($kelas as $hasil){
                    if($jml_avail_kamar_bykelas[$hasil->id_kelas]>=$kamar){
                        array_push($available, $hasil->id_kelas);
                    }
                }    

                $kelas= M_kelas_kamar::findMany($available);

                // $maindata = array('avail_kelas'=>$kelas,
                //                   'all_avail_kamar'=>$avail_kamar,
                //                   'available_kamar'=>$all_data_avail,
                //                   'jml_avail_kamar_bykelas'=>$jml_avail_kamar_bykelas);
                // echo json_encode($maindata);
                $index=0;    foreach($kelas as $kelas_kamar){ $index++;
                        $indexs=0;
                        foreach($avail_kamar as $kamar){;
                            if($kamar->id_kelas == $kelas_kamar->id_kelas){
                            $indexs = intval($indexs+1); 
                            $all_data_avail[$kelas_kamar->id_kelas][$indexs] = $kamar->id_kamar;
                            }
                        }
                    }
                $maindata = array('avail_kelas'=>$kelas,
                                  'all_avail_kamar'=>$avail_kamar,
                                  'available_kamar'=>$all_data_avail,
                                  'jml_avail_kamar_bykelas'=>$jml_avail_kamar_bykelas);

                //     $tes = 'kelas_0001';
                //     for($i=1; $i<=count($all_data_avail[$tes]); $i++){
                //         echo ($all_data_avail[$tes][$i])."</br>";
                //     }


                    // echo json_encode(($all_data_avail));
                echo $this->result_kamar($request,$maindata);
        }else{
            return redirect('/home/pesan_kamar')->with('error_notif', "Data Tidak Ditemukan, Periksa Kembali Format Pencarian");
        }

    }

    public function result_kamar(Request $request,$maindata){
         $data['MainTitle'] = "Grahawisata - Pesan Kamar";
         $data['FormTitle'] = "Pemesanan Kamar";
         $data['LayoutType'] = $request->get('layout');
         $data['maindata'] = $maindata;
         $data['keyword'] = null;
         $data['PluginJS'] = null;
         $data['SupportJS'] = null;
         $data['ContentSupport'] = null;
         return View::make('content.VContentPesanKamar')->with($data);
    }

    public function booking(Request $request){
        // if(session('boolean_step1')){
            if($this->check_session_booking()){
                 $data['MainTitle'] = "Grahawisata - Pesan Kamar";
                 $data['FormTitle'] = "Pemesanan Kamar";
                 $data['LayoutType'] = $request->get('layout');
                 $data['maindata'] = null;
                 $data['keyword'] = null;
                 $data['PluginJS'] = null;
                 $data['SupportJS'] = null;
                 $data['ContentSupport'] = null;
                return View::make('content.VContentBookingKamar')->with($data);
            }else{
                return redirect('/home/pesan_kamar')->with('error_notif', "Data Telah Expired, Ulangi Pengisian Data");
            }
        // }else{
        //         return redirect('/home/pesan_kamar')->with('error_notif', "Data Telah Expired, Ulangi Pengisian Data");
        // }
    }

    public function check_session_booking(){
        if( !empty(session('waktu')) 
            and !empty(session('total_harga'))
            and !empty(session('durasi'))
            and !empty(session('nama_kelas')) 
            and !empty(session('jml_kamar')) 
            and !empty(session('jml_pengunjung'))
        ){
            return true;
        }else{
            return false;
        }
    }


//////////////////////////////////////////////////////// PESANAN /////////////////////////////////////////////////////////     




    public function tes(Request $request){
        // $hasil = M_kelas_kamar::withTrashed()->count();
        // $hasil = M_kelas_kamar::find('kelas_0001');
        // $hasil = M_kamar::mgenerate_id();

        //// hasmany
        // $hasil = M_kelas_kamar::where('id_kelas','kelas_0001')->get();
        // foreach($hasil as $value){
        //         echo $value->id_kelas." punya banyak kamar yaitu "."</br>";
        //     foreach($value->kamar as $result){
        //         echo $result->id_kamar."</br>";
        //     }
        // }

        // //belongsto
        // $hasil = M_kamar::with('kelas_kamar')->get();
        // foreach($hasil as $value){
        //         echo "kamar dengan id kamar : ".$value->id_kamar." memiliki kelas ".$value->kelas_kamar->nama."</br>";
        // }

        // $namakelas = "adelia";
        // $hasil = M_kelas_kamar::mget_id_kelas_by_name($namakelas); 
       
        // kelas kamar have fasilitas and kamar
        // $hasil = M_kelas_kamar::with('fasilitas')->get();
        // $hasil = M_kelas_kamar::with('fasilitas','kamar')->get();
        // foreach($hasil as $value){
        //         echo $value->id_kelas." punya banyak kamar dan fasilitas yaitu "."</br>";
        //         echo "</br></br>";
        //         echo $value->fasilitas."</br>";
        //         echo "</br>";
        //         echo $value->kamar."</br>";
        //         echo "</br></br>";
        // }

        // echo json_encode($hasil);

 
        // $hasil = M_kamar::get();
        // foreach($hasil as $value){
        //         // echo "kamar dengan id kamar : ".$value->id_kamar." memiliki kelas ".$value->kelas_kamar->nama."</br>";
        //         echo $value;
        //         echo $value->kelas_kamar;
        // }



        // $id_kelas = "kelas_0003";
        // $hasil=    M_kamar::whereHas('kelas_kamar', function($query)  use ($id_kelas) {
        //             return $query->where('id_kelas', $id_kelas);
        //         })->get()->pluck('id_kamar')->toArray();

    // echo json_encode($hasil);

        
        //// validate format date 
        // $get_start ="10-03-2017"." 14:00:00";
        // $get_end = "15-03-2017"." 12:00:00";
        // $jml_kamar = 15;
        // $day_start = $this->validateDate($get_start);
        // $day_end =$this->validateDate($get_end);
        // if(($day_start) and ($day_end) and $day_start<$day_end){
        //     $order_detail = M_detail_reservasi::with('order')->whereBetween('tanggal' ,array($day_start->format('Y-m-d H:i:s'),$day_end->format('Y-m-d H:i:s')))->get()->pluck('order');
        //     $kamar_exception = array();
        //     foreach($order_detail as $hasil){
        //             if(!in_array($hasil->id_kamar, $kamar_exception)){
        //                  array_push($kamar_exception, $hasil->id_kamar);
        //             }
        //     }  
        // //    $avail_jml_kamar_bykelas = array_count_values( M_kamar::whereNotIn('id_kamar',$kamar_exception)->get()->pluck('id_kelas')->toArray());
        //    $avail_kamar = M_kamar::whereNotIn('id_kamar',$kamar_exception)->get()->pluck('id_kamar');
        //     if(count($avail_kamar)>=$jml_kamar){
        //     $avail_kelas = array_values(array_unique( M_kamar::whereNotIn('id_kamar',$kamar_exception)
        //                                 ->get()
        //                                 ->pluck('id_kelas')
        //                                 ->toArray() ));
        //     // echo json_encode(($avail_kamar));
        //     echo json_encode(($avail_kelas));
        //     }else{
        //         echo "jumlah kamar tidak mencukupi";   
        //     }
        // }else{
        //     echo "terjadi kesalahan pada format tanggal";
        // }


        ////updateorcreate
        // $id="3374151405925555";

        // $hasil = M_pengunjung::updateOrCreate(array('id_pengunjung'=>$id),array('nama'=>'manggala asdasdd',
        //                                                                         'telepon'=>'08456212541',
        //                                                                         'alamat'=>'jl. lokoloko'));
        // if($hasil){
        // }else{
        //     echo "gagal";
        // }

        $hasil = M_order::with('detail_reservasi','pengunjung','pengguna')->get();
        echo json_encode($hasil);
    }

    protected function tes_mail(Request $request){
            $title = "tes mail";
            $content = "ini content";

        $sent =    Mail::raw('Tes Hello World', function ($message)
            {

                // $message->from('me@gmail.com', 'Christian Nwamba');

                $message->subject('Testing Verify Email');
                $message->to('mangga.raka@yahoo.co.id');

            });

            // return response()->json(['message' => 'Request completed']);
        return $sent;
    }


    protected function validateDate($tanggal, $format = 'd-m-Y H:i:s'){
        $date = new \DateTime();
        $real_date = $date->createFromFormat($format, $tanggal); 
        return $real_date;
    }

    protected function validateGuestKamar($guest,$kamar){
        if($guest>=$kamar and is_numeric($guest) and is_numeric($kamar) and ($guest>0) and ($kamar>0)){
            return true;
        }else{
            return false;
        }
    }
    // public function add_kamar(){         
    //     $id_kelas = "kelas_0001";
    //     $jumlah_kamar = "8";
    //     $total = M_kamar::mtotal_by_kelas($id_kelas);
    //     if($total < 1){
    //         $start = 0;
    //     }else{
    //         $start = M_kamar::mlast_no_kamar_by_kelas($id_kelas);
    //     }

    //     for($i=($start+1); $i<=($jumlah_kamar+$start); $i++){
    //         //insert to db
    //         echo $i."</br>";
    //     }
    // }
    
}
