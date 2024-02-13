<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return view('welcome')->with('news', $news);
    }
    public function index2(Request $request)
{
    $request->validate([
        'pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'header' => 'required',
        'description' => 'required',
        'datetime' => 'required|date_format:Y-m-d\TH:i' // Validate the event date and time format
    ]);

    if ($request->hasFile('pic')) {
        $path = $request->file('pic')->store('images', 'public');
        
        $data = [
            'header' => $request->header,
            'description' => $request->description,
            'pic' => $path,
            'datetime' => now()->format('Y-m-d H:i:s') // Store the current date and time in the correct format
        ];
        
        
        $event = News::create($data);
        
        return redirect()->back()->with('success', 'Event created successfully.');
    }

    return redirect()->back()->with('error', 'Error uploading image.');
}
}
