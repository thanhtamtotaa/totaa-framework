<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Totaa\TotaaBfo\Models\BfoInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User\YeuCauCapQuyen as YeuCauCapQuyenModel;

class YeuCauCapQuyen extends Component
{
    /**
     * Các biến dùng trong Component
     *
     * @var int
     */
    public $hoten, $mnv, $nhom, $ngaysinh, $ngaythuviec, $user;

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'hoten' => 'required',
        'mnv' => 'required|exists:bfo_infos,mnv',
        'ngaysinh' => 'required|date_format:d-m-Y',
        'ngaythuviec' => 'required|date_format:d-m-Y',
        'nhom' => 'required',
    ];

    /**
     * Validation messages
     *
     * @var array
     */
    protected $messages = [
        'hoten.required' => 'Vui lòng nhập họ tên',
        'mnv.required' => 'Vui lòng nhập Mã nhân viên',
        'mnv.exists' => 'Không tìm thấy mã nhân viên này',
        'ngaysinh.required' => 'Vui lòng chọn Ngày sinh',
        'ngaysinh.date_format' => 'Ngày sinh không đúng định dạng d-m-Y',
        'ngaythuviec.required' => 'Vui lòng chọn Ngày bắt đầu thử việc',
        'ngaythuviec.date_format' => 'Ngày bắt đầu thử việc không đúng định dạng d-m-Y',
        'nhom.required' => 'Vui lòng nhập nhập nhóm',
    ];

    /**
     * Khởi tạo dữ liệu
     *
     * @return void
     */
    public function mount()
    {
        $this->user = Auth::user();

        if (!!$this->user->yeucaucapquyen) {
            $this->hoten = $this->user->yeucaucapquyen->hoten;
        } else {
            $this->hoten = $this->user->name;
        }

        $this->mnv = optional($this->user->yeucaucapquyen)->mnv;
        $this->nhom = optional($this->user->yeucaucapquyen)->nhom;
        $this->ngaysinh = optional(optional($this->user->yeucaucapquyen)->ngaysinh)->format("d-m-Y");
        $this->ngaythuviec = optional(optional($this->user->yeucaucapquyen)->ngaythuviec)->format("d-m-Y");
    }

    /**
     * Render view
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.user.yeu-cau-cap-quyen');
    }

    /**
     * On updated action
     *
     * @param  mixed $propertyName
     * @return void
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Lưu lại thông tin
     *
     * @return void
     */
    public function save()
    {
        //Xác thực dữ liệu
        $this->validate();

        if (!!$this->user->yeucaucapquyen) {
            $YeuCauCapQuyenModel = $this->user->yeucaucapquyen;
        } else {
            $YeuCauCapQuyenModel = new YeuCauCapQuyenModel;
        }

        $YeuCauCapQuyenModel->hoten = mb_convert_case($this->hoten, MB_CASE_TITLE, "UTF-8");
        $YeuCauCapQuyenModel->mnv = $this->mnv;
        $YeuCauCapQuyenModel->nhom = $this->nhom;
        $YeuCauCapQuyenModel->ngaysinh = $this->ngaysinh;
        $YeuCauCapQuyenModel->ngaythuviec = $this->ngaythuviec;

        $this->user->yeucaucapquyen()->save($YeuCauCapQuyenModel);

        $this->mount();

        $BfoInfo = BfoInfo::find($YeuCauCapQuyenModel->mnv);

        if (($BfoInfo->full_name == $YeuCauCapQuyenModel->hoten) && ($BfoInfo->birthday->format("d-m-Y") == $YeuCauCapQuyenModel->ngaysinh->format("d-m-Y")) && ($BfoInfo->ngay_vao_lam->format("d-m-Y") == $YeuCauCapQuyenModel->ngaythuviec->format("d-m-Y"))) {
            if ($this->user->bfo_info()->associate($BfoInfo)->save()) {
                $BfoInfo->update(["active", true]);
                return Redirect::to(url()->previous());
            };
        }
    }


}
