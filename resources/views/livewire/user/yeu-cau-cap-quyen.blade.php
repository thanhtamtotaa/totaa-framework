<div>
    @php
        $yeucaucapquyen = Auth::user()->yeucaucapquyen;
    @endphp

    @if (!!$yeucaucapquyen)
        <p class="text-big">Vì thông tin bạn cung cấp chưa chính xác nên hệ thống không thể tự động cấp quyền cho bạn, vui lòng cập nhật thông tin hoặc chở xử lý bằng tay</b></p>
    @else
        <p class="text-big">Vui lòng cung cấp thông tin để được hỗ trợ.</p>
    @endif

    <div class="coming-soon-subscribe pt-3 mt-2 mb-auto">
        <div class="form-row">
            <div class="col-12 mb-3">
                <input type="text" wire:model.lazy="hoten" class="form-control px-2 form-control-lg form-control-inverted font-secondary" placeholder="Họ và tên...">
                @error('hoten')
                    <label class="pl-1 mb-0 small invalid-feedback d-inline-block" ><i class="fas mr-1 fa-exclamation-circle"></i>{{ $message }}</label>
                @enderror
            </div>

            <div class="col-12 mb-3">
                <input type="text" wire:model.lazy="mnv" class="form-control px-2 form-control-lg form-control-inverted font-secondary" placeholder="Mã nhân viên...">
                @error('mnv')
                    <label class="pl-1 mb-0 small invalid-feedback d-inline-block" ><i class="fas mr-1 fa-exclamation-circle"></i>{{ $message }}</label>
                @enderror
            </div>

            <div class="col-12 mb-3">
                <input type="text" wire:model.lazy="nhom" class="form-control px-2 form-control-lg form-control-inverted font-secondary" placeholder="Nhóm...">
                @error('nhom')
                    <label class="pl-1 mb-0 small invalid-feedback d-inline-block" ><i class="fas mr-1 fa-exclamation-circle"></i>{{ $message }}</label>
                @enderror
            </div>

            <div class="col-12 mb-3" id="ngaysinh_div">
                <input type="text" wire:model="ngaysinh" startview-totaa="3" container-totaa="ngaysinh_div" class="datepicker-totaa form-control px-2 form-control-lg form-control-inverted font-secondary" readonly placeholder="Ngày sinh...">
                @error('ngaysinh')
                    <label class="pl-1 mb-0 small invalid-feedback d-inline-block" ><i class="fas mr-1 fa-exclamation-circle"></i>{{ $message }}</label>
                @enderror
            </div>

            <div class="col-12 mb-3" id="ngaythuviec_div">
                <input type="text" wire:model="ngaythuviec" startview-totaa="0" container-totaa="ngaythuviec_div" class="datepicker-totaa form-control px-2 form-control-lg form-control-inverted font-secondary" readonly placeholder="Ngày thử việc...">
                @error('ngaythuviec')
                    <label class="pl-1 mb-0 small invalid-feedback d-inline-block" ><i class="fas mr-1 fa-exclamation-circle"></i>{{ $message }}</label>
                @enderror
            </div>

            <div class="col-sm-3 mt-2 mt-sm-0">
                <button type="submit" class="btn btn-primary btn-lg btn-block font-secondary text-expanded px-0"  wire:click.prevent="save()" wire:loading.attr="disabled">
                    <small class="font-weight-bold">{{ !!$yeucaucapquyen ? "Cập nhật" : "Xác nhận" }}</small>
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @push('livewires')
        <script>
            if ($("input.datepicker-totaa").length != 0) {
                $("input.datepicker-totaa").each(function(e) {
                    $(this)
                        .datepicker({
                            language: "vi",
                            autoclose: true,
                            toggleActive: true,
                            todayHighlight: true,
                            todayBtn: "linked",
                            clearBtn: true,
                            maxViewMode: 3,
                            startView: $(this).attr("startview-totaa"),
                            minViewMode: 0,
                            weekStart: 1,
                            format: "dd-mm-yyyy",
                            orientation: isRtl ? "auto right" : "auto left"
                        }).change(function(e) {
                            @this.set($(this).attr("wire:model"), $(this).val());
                        });
                });
            }
        </script>
    @endpush
</div>
