@extends('layouts.MasterAdm')
@section('content')

    <div class="row">
        <div class="col-md-12 col-xs-12">
            
            <div class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>{{$FormTitle or ''}}</strong> </h3>
                    <ul class="panel-controls">
                    </ul>
                </div>
                <div class="panel-body">  

                <div class="col-md-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body panel-body-image">
                            <a href="#" class="panel-body-inform">
                                <span class="fa fa-money"></span>
                            </a>
                        </div>
                        </br>
                        </br>
                        <div class="row">
                            <div class="col-md-4">

                                <div class="widget widget-primary">
                                    <div class="widget-title">TOTAL Pemasukan</div>
                                    <div class="widget-subtitle">26/08/2014</div>
                                    <div class="widget-int">$ <span data-toggle="counter" data-to="1564">1,564</span></div>
                                    <div class="widget-controls">
                                        <a href="#" class="widget-control-left"><span class="fa fa-upload"></span></a>
                                        <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">

                                <div class="widget widget-success widget-no-subtitle">
                                    <div class="widget-big-int">$ <span class="num-count">4,381</span></div>                            
                                    <div class="widget-subtitle">Latest transaction</div>
                                    <div class="widget-controls">
                                        <a href="#" class="widget-control-left"><span class="fa fa-cloud"></span></a>
                                        <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
                                    </div>                            
                                </div>                        

                            </div>
                            <div class="col-md-4">

                                <div class="widget widget-danger widget-padding-sm">
                                    <div class="widget-big-int plugin-clock">00:00</div>                            
                                    <div class="widget-subtitle plugin-date">Loading...</div>
                                    <div class="widget-controls">                                
                                        <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
                                    </div>                            
                                    <div class="widget-buttons widget-c3">
                                        <div class="col">
                                            <a href="#"><span class="fa fa-clock-o"></span></a>
                                        </div>
                                        <div class="col">
                                            <a href="#"><span class="fa fa-bell"></span></a>
                                        </div>
                                        <div class="col">
                                            <a href="#"><span class="fa fa-calendar"></span></a>
                                        </div>
                                    </div>                            
                                </div>                        

                            </div>

                        </div>

                        <div class="panel-body">                                                                      
                            <!-- <div class="col-md-4">

                                <h6><strong> <a style="text-decoration:none; color:black;">Pencarian Data Pemasukan</a> &nbsp; </strong>
                                    <i class="fa fa-sort" data-toggle="collapse" data-target="#accrd_pencarian_kamar"></i>
                                </h6> 
                                </br></br>
                                    <form  method="GET" action="{{ url('home/#') }}">
                                        <div class="form-group">
                                        <div class="col-md-12 col-xs-12"> 
                                            <h8><strong>1 Tahun</strong></h8>  
                                            <label class="text-info">  * Pilih Tahun </label><br>                                     
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                <?php $tahun = date("Y"); ?>
                                                <input type="number" class="form-control flat-datepicker" name="waktu" value="{{  $tahun }}" />
                                            </div>  
                                            </br>



                                            <h8><strong>2 Bulan</strong></h8>  
                                            <label class="text-info">  Pilih Bulan </label><br>
                                            <div class="col-md-6 col-xs-6">                                  
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                    <select class="form-control" name="durasi">
                                                        <option value="1">Januari</option>
                                                        <option value="2">Februari</option>
                                                        <option value="3">Maret</option>
                                                        <option value="4">April</option>
                                                        <option value="5">Mei</option>
                                                        <option value="6">Juni</option>
                                                        <option value="7">Juli</option>
                                                        <option value="8">Agustus</option>
                                                        <option value="9">September</option>
                                                        <option value="10">Oktober</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Desember</option>
                                                    </select>
                                                </div>
                                            </div>      

                                            <div class="col-md-6 col-xs-6">                                  
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                    <select class="form-control" name="durasi">
                                                        <option value="1">Januari</option>
                                                        <option value="2">Februari</option>
                                                        <option value="3">Maret</option>
                                                        <option value="4">April</option>
                                                        <option value="5">Mei</option>
                                                        <option value="6">Juni</option>
                                                        <option value="7">Juli</option>
                                                        <option value="8">Agustus</option>
                                                        <option value="9">September</option>
                                                        <option value="10">Oktober</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Desember</option>
                                                    </select>
                                                </div>
                                            </div>  
                                            </br>
                                            </br>
                                            </br>

                                            <h8><strong>1 Tahun</strong></h8>  
                                            <label class="text-info">  * Pilih Tahun </label><br>                                     
                                            <div class="input-group">  
                                                    <span class="input-group-addon">from</span>
                                                    <input type="text" class="form-control" placeholder="Tanggal"/>
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" class="form-control" placeholder="Tanggal"/>
                                                
                                            </div>  
                                            </br>


                                            <div class="block">
                                                <h8><strong>1 Tahun</strong></h8>  
                                                <label class="text-info">  * Pilih Tahun </label><br>                                    
                                                <div class="input-group">  
                                                    <span class="input-group-addon">from</span>
                                                    <input type="text" class="form-control datepicker" placeholder="Tanggal"/>
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" class="form-control datepicker" placeholder="Tanggal"/>
                                                </div>
                                            </div>



                                            </br>
                                            </br>
                                            </br>
                                            <h6><strong>4 Cari</strong></h6> 
                                            <div class="form-group">                                        
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary btn-block">Cari</button>
                                                </div>
                                            </div>  


                                        </div>
                                        </div>
                                    </form>  
                                <!-- </div>                               
                            </div> -->
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                                                            
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                            <input type="text" class="form-control" name="key_pemasukan" placeholder="Keyword Pencarian"/>
                                        </div>
                                    </div>    
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <?php if(Request::segment(3)=="tahunan"){?>  
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                <?php $tahun = date("Y"); ?>
                                                <input type="number" class="form-control flat-datepicker" name="tahun" value="{{  $tahun }}" />
                                            <?php }else if(Request::segment(3)=="bulanan"){?>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                <select class="form-control" name="bulan">
                                                    <option value="01">Januari</option>
                                                    <option value="02">Februari</option>
                                                    <option value="03">Maret</option>
                                                    <option value="04">April</option>
                                                    <option value="05">Mei</option>
                                                    <option value="06">Juni</option>
                                                    <option value="07">Juli</option>
                                                    <option value="08">Agustus</option>
                                                    <option value="09">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            <?php }else if(Request::segment(3)=="harian"){ ?>
                                                <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>
                                                <input type="text" class="form-control datepicker" name-"hari" value="<?php echo date("Y-m-d");?>"/>           
                                            <?php } else if(Request::segment(3)=="all"){ ?>
                                                <span class="input-group-addon">dari</span>
                                                <input type="text" class="form-control datepicker" placeholder="Tanggal" name="tanggal_between[]" />
                                                <span class="input-group-addon">sampai</span>
                                                <input type="text" class="form-control datepicker" placeholder="Tanggal" name="tanggal_between[]" />
                                             <?php } else { ?>
<!--                                             <span class="input-group-addon add-on"><span class="fa fa-calendar"></span></span>
                                            <input type="text" class="form-control datepicker" value=" <?php echo date("Y-m-d");?>"/>   -->                                              
                                            <?php } ?>
                                        </div>                                            
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <div class="btn-group btn-group-justified">  
                                            <a href="{{ url('home/pemasukan/all ') }}" class="btn btn-primary active">Semua</a>
                                            <a href="{{ url('home/pemasukan/tahunan') }}" class="btn btn-primary">Tahun</a>
                                            <a href="{{ url('home/pemasukan/bulanan') }}" class="btn btn-primary">Bulan</a>
                                            <a href="{{ url('home/pemasukan/harian') }}" class="btn btn-primary">Hari</a>
                                        </div>                                         
                                    </div>
                                    <div class="col-md-4">
                                            <button class="btn  btn-primary btn-block"><span class="fa fa-search"></span> Cari</button>
                               
                                    </div>
                                </div>
                            </form>                            
                        </div>

                        <div class="panel-body">                                                                      
                            <div class="col-md-12 col-xs-12">
                                <?php if(count($maindata)>0){?>
                                        <div class="table-responsive">
                                            <table id="table-leviauto" class="table table-bordered table-striped table-actions">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center"> No </th>
                                                        <th class="text-center"> Nama </th>
                                                        <th class="text-center"> Id Pesanan</th>
                                                        <th class="text-center">Durasi</th>
                                                        <th class="text-center"> Kode Promo</th>
                                                        <th class="text-center"> Tamu </th>
                                                        <th class="text-center"> Total Harga </th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                <?php if(count($maindata)<1) { ?>
                                                    <tr> <td colspan="7" class="text-center"> tidak ada data </td> </tr>
                                                <?php }else{ ?>
                                                    <?php $i = 0; ?>
                                                    @foreach($maindata as $hasil) <?php $i++; ?>
                                                        <tr>
                                                            <td class="text-center"><strong>{{$maindata->perPage() * ($maindata->currentPage()-1)+$i}}</strong></td>
                                                            <td class="text-center">{{$hasil->pengunjung->nama}}</td>
                                                            <td class="text-center">{{$hasil->id_pesanan}}</td>
                                                            <td class="text-center">{{$hasil->jumlah_hari}} hari</td>
                                                            <td class="text-center">{{$hasil->kode_promo or 'tidak ada'}}</td>
                                                            <td class="text-center">{{$hasil->jumlah_tamu}}</td>
                                                            <td class="text-center"><?php echo  "Rp ". number_format(($hasil->total_harga),2,",","."); ?></td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="7" class="text-center">
                                                                <div class="col-md-6 col-xs-12">
                                                                    <a style="text-decoration:none;"  data-toggle="collapse"  data-target="#accord_detail_pengunjung{{$hasil->id_pesanan}}">
                                                                        <button class="btn  btn-info btn-block"><span class="fa fa-users"></span> Detail Pengunjung</button>
                                                                    </a>
                                                                </div> 
                                                                <div class="col-md-6 col-xs-12">
                                                                    <a style="text-decoration:none;"  data-toggle="collapse"  data-target="#accord_detail_reservasi{{$hasil->id_pesanan}}">
                                                                        <button class="btn  btn-info btn-block"><span class="fa fa-file-text-o"></span> Detail Pemesanan</button>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td colspan="7">
                                                                <div id="accord_detail_pengunjung{{$hasil->id_pesanan}}" class="collapse">
                                                                    <!-- CONTACT ITEM -->
                                                                    <div class="panel panel-danger">
                                                                        <div class="panel-body profile">
                                                                            <div class="profile-image">
                                                                                <img src="{{ URL::asset('image/profile_picture/profile_default.jpg') }}" />
                                                                            </div>
                                                                            <div class="profile-data">
                                                                                <div class="profile-data-name">{{$hasil->pengunjung->nama}}</div>
                                                                                <div class="profile-data-title">{{$hasil->pengunjung->id_pengunjung}}</div>
                                                                            </div>
                                                                        </div>                                
                                                                        <div class="panel-body">                                    
                                                                            <div class="contact-info">
                                                                                <p><small>Mobile</small><br/>{{$hasil->pengunjung->telepon}}</p>
                                                                                <p><small>Email</small><br/>nadiaali@domain.com</p>
                                                                                <p><small>Address</small><br/>{{$hasil->pengunjung->alamat}}</p>                                   
                                                                            </div>
                                                                        </div>                                
                                                                    </div>
                                                                    <!-- END CONTACT ITEM -->                                
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="7">
                                                                <div id="accord_detail_reservasi{{$hasil->id_pesanan}}" class="collapse">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-body">
                                                                            <h2><span class="fa fa-file-text-o"></span> Detail Pemesanan</h2>
                                                                            <div class="user">
                                                                                <a href="#" class="name">{{$hasil->pengunjung->nama}}</a>
                                                                                <div class="pull-right" style="width: 100px;">
                                                                                    <button class="btn btn-info btn-block"><span class="fa fa-twitter"></span> Follow</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>                            
                                                                        <div class="panel-body list-group">
                                                                            <div class="list-group-item">
                                                                                Quisque lacinia sem ligula, eget <a href="#">#varius</a> massa vulputate at. Sed imperdiet congue enim.<br/>
                                                                                <span class="text-muted">1h ago</span>
                                                                            </div>
                                                                            <div class="list-group-item">
                                                                                Nam faucibus vulputate justo, id viverra orci porta vel.<br/>
                                                                                <span class="text-muted">1h ago</span>
                                                                            </div>
                                                                            <div class="list-group-item">
                                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="#">@Donec</a> at tellus sed mauris.<br/>
                                                                                <span class="text-muted">1h ago</span>
                                                                            </div>
                                                                            <div class="list-group-item">
                                                                                Quisque lacinia sem ligula, eget varius massa vulputate at. Sed imperdiet congue enim.<br/>
                                                                                <span class="text-muted">1h ago</span>
                                                                            </div>                                
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

<!--                                                         <tr>
                                                            <td colspan="7" bgcolor="#202020"> 
                                                            </td>
                                                        </tr> -->
                                                    @endforeach
                                                <?php } ?>                   
                                                </tbody>
                                            </table>
                                        </div>                                 
                                <?php }else{?>

                                <?php } ?>

                                <?php if(count($maindata)>0) { ?> {{ $maindata->links() }} <?php } ?>
                            </div>
                        </div>    
                    </div>
                </div>  
            </div>
            </div>
            
        </div>
    </div>     

       
    
@stop


@section('supportcontent')
    <?=$ContentSupport?>
@stop

@section('pluginjs')
    <?=$PluginJS?>
@stop

@section('supportjs')
    <?=$SupportJS?>   
@stop