<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class CheckAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!!!Auth::user()->bfo_info) {
            return response()->view('auth.update-info',[
                'title' => 'Đã có lỗi sảy ra...',
                'error_code' => '403',
                'error_description' => 'Không có quyền truy cập',
                'text_xlarge' => 'Tài khoản chưa được liên kết với thông tin BFO<br>Vui lòng cung cấp thông tin để được trợ giúp',
                ]);
        } elseif (optional(Auth::user()->bfo_info)->active===0) {
            return response()->view('errors.dynamic',[
                'title' => 'Tài khoản đã bị vô hiệu hóa',
                'error_code' => '403',
                'error_description' => 'Không có quyền truy cập',
                'text_xlarge' => 'Vui lòng liên hệ phòng truyền thông để được trợ giúp',
                ]);
        } elseif (!!!optional(Auth::user()->bfo_info)->active) {
            return response()->view('errors.dynamic',[
                'title' => 'Tài khoản chưa được kích hoạt',
                'error_code' => '403',
                'error_description' => 'Không có quyền truy cập',
                'text_xlarge' => 'Vui lòng liên hệ phòng truyền thông để được trợ giúp',
            ]);
        } else {
            return $next($request);
        }
    }
}
