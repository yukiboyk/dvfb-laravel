@extends('clients.layouts.master')
@section('title') 
<title> Nạp Thẻ cào | {{webSetting('name_website')}} </title>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-7">
        <div class="card ribbon-box">
            <div class="card-body">
                <div class="mb-5">
                    <div class="ribbon ribbon-success ribbon-shape ">NẠP THẺ CÀO</div>
                </div>
                <!-- Warning Alert -->
<div class="alert alert-warning alert-border-left alert-dismissible fade show" role="alert">
    <i class="ri-alert-line me-3 align-middle"></i> <strong>CHÚ Ý</strong> - VUI LÒNG CHỌN ĐÚNG LOẠI THẺ VÀ MỆNH GIÁ NHÉ
    </div>
        <form action="{{route('cardSubmit')}}" method="POST" id="ajaxSubmitForm">
            @csrf
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nameInput" class="form-label">Loại thẻ</label>
                    </div>
                    <div class="col-lg-9">
                        <select class="form-control" name="telco">
                            <option value="">-- Chọn loại thẻ --</option>
                            <option value="VIETTEL">Viettel</option>
                            <option value="VINAPHONE">Vinaphone</option>
                            <option value="MOBIFONE">Mobifone</option>
                            <option value="VNMOBI">Vietnamobile</option>
                            <option value="ZING">Zing</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nameInput" class="form-label">Mệnh giá</label>
                    </div>
                    <div class="col-lg-9">
                        <select class="form-control" onchange="totalPrice()" id="amount" name="amount">
                            <option value="">-- Chọn mệnh giá --</option>
                            <option value="10000">10.000đ</option>
                            <option value="20000">20.000đ</option>
                            <option value="30000">30.000đ</option>
                            <option value="50000">50.000đ</option>
                            <option value="100000">100.000đ</option>
                            <option value="200000">200.000đ</option>
                            <option value="300000">300.000đ</option>
                            <option value="500000">500.000đ</option>
                            <option value="1000000">1.000.000đ</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nameInput" class="form-label">Serial</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" id="serial" name="serial" class="form-control"
                            placeholder="Nhập serial thẻ" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nameInput" class="form-label">Mã Thẻ</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" id="code" name="code" class="form-control"
                            placeholder="Nhập mã thẻ" />
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="alert alert-danger alert-dismissible alert-outline fade show" role="alert">
                        Coin nhận được: <b id="ketqua" style="color: red;">0</b> coin
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12 fv-row text-center">
                        <button type="submit" class="btn btn-success">Nạp Thẻ Ngay</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card ribbon-box">
            <div class="card-body">
                <div class="mb-5">
                    <div class="ribbon ribbon-success ribbon-shape ">LƯU Ý NẠP THẺ</div>
                </div>
                  - Để cái đây trong admin cài đặt
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card ribbon-box">
            <div class="card-body">
                <div class="mb-5">
                    <div class="ribbon ribbon-success ribbon-shape ">LỊCH SỬ NẠP THẺ</div>
                </div>
                <div class="table-responsive p-0">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100% ;text-align: center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>MGD</th>
                                <th>Mã Thẻ</th>
                                <th>Mệnh giá</th>
                                <th>Trạng thái</th>
                                <th>Thời gian</th>
                                <th>Ghi Chú</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($history_card as $hiscard)
                            <tr>
                                <td>{{$i++}}</td>
                                <td><b>{{$hiscard->order_id}}</b></td>
                                <td>{{$hiscard->code}}</td>
                                <td><b style="color: red;">{{number_format($hiscard->receive_amount)}} đ</b></td>
                                <td>{!! StatusCard($hiscard->status) !!}</td>
                                <td>{{$hiscard->created_at}}</td>
                                <td>{{$hiscard->note}}</td>
                            </tr>
                            @endforeach 
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
@push('script')
<script src="{{ URL::asset('assets/js/pages/pricing.init.js') }}"></script>

<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.js') }}"></script>
<script>
function totalPrice() {
    var total = 0;
    var amount = $("#amount").val();
    total = amount - amount * {{websetting('ck_card')}}/100;
    $('#ketqua').html(total.toString().replace(/(.)(?=(\d{3})+$)/g, '$1.'));
}    
</script>
@endpush