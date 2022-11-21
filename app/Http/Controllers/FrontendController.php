<?php

namespace App\Http\Controllers;

use App\Models\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    public function index()
    {
        return view('backend.admin.home.setting', [
            "data"  => Frontend::whereId(1)->first(),
        ]);
    }

    public function update(Request $request, Frontend $frontend)
    {
        $rules = [
            'email'             => 'required|email',
            'phone'             => 'required|min:8|max:20',
            'twitter'           => '',
            'facebook'          => '',
            'instagram'         => '',
            'linkedin'          => '',
            'main_picture'      => 'image|file',
            'main_title'        => 'required',
            'main_subtitle'     => 'required',
            'title1'            => 'required',
            'subtitle1'         => 'required',
            'title2'            => 'required',
            'subtitle2'         => 'required',
            'title3'            => 'required',
            'subtitle3'         => 'required',
            'second_title'      => 'required',
            'second_subtitle'   => 'required',
            'second_picture'    => 'image|file',
            'content1_picture'  => 'image|file',
            'content1_title'    => 'required',
            'content1_subtitle' => 'required',
            'content2_picture'  => 'image|file',
            'content2_title'    => 'required',
            'content2_subtitle' => 'required',
            'content3_picture'  => 'image|file',
            'content3_title'    => 'required',
            'content3_subtitle' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('main_picture')) {
            if ($request->oldmain_picture) {
                Storage::delete($request->oldmain_picture);
            }
            $validatedData['main_picture'] = $request->file('main_picture')->store('picture-frontend');
        }
        if ($request->file('second_picture')) {
            if ($request->oldsecond_picture) {
                Storage::delete($request->oldsecond_picture);
            }
            $validatedData['second_picture'] = $request->file('second_picture')->store('picture-frontend');
        }
        if ($request->file('content1_picture')) {
            if ($request->oldcontent1_picture) {
                Storage::delete($request->oldcontent1_picture);
            }
            $validatedData['content1_picture'] = $request->file('content1_picture')->store('picture-frontend');
        }
        if ($request->file('content2_picture')) {
            if ($request->oldcontent2_picture) {
                Storage::delete($request->oldcontent2_picture);
            }
            $validatedData['content2_picture'] = $request->file('content2_picture')->store('picture-frontend');
        }
        if ($request->file('content3_picture')) {
            if ($request->oldcontent3_picture) {
                Storage::delete($request->oldcontent3_picture);
            }
            $validatedData['content3_picture'] = $request->file('content3_picture')->store('picture-frontend');
        }

        $hasil = Frontend::whereId(1)->update($validatedData);

        if ($hasil) {
            return redirect()->back()->with('success', 'Data Home berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Data Home gagal diperbarui!');
        }
    }
}
