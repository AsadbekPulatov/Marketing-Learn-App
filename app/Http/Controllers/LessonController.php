<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Http\Requests\SaveServiceRequest;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons=Lesson::orderby('id','desc')->get();
        return view('admin.lessons.index',[
            'lessons' => $lessons
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lesson = new Lesson();
        return view('admin.lessons.form',[
            'lesson' => $lesson
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveServiceRequest $request,Lesson $lesson)
    {
        $url = $request->url;
        $videoId = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_FILENAME);
        $embeddedUrl = "https://www.youtube.com/embed/{$videoId}";
        if ($query = parse_url($url, PHP_URL_QUERY)) {
            $embeddedUrl .= '?' . $query;
        }
        $video_name = $embeddedUrl;


        $lesson->create([
            'title' => $request['title'],
            'url' => $video_name,
        ]);

        return redirect()->route('lessons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('admin.lessons.form',[
            'lesson' => $lesson
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(SaveServiceRequest $request, Lesson $lesson)
    {
        $url = $request->url;
        $videoId = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_FILENAME);
        $embeddedUrl = "https://www.youtube.com/embed/{$videoId}";
        if ($query = parse_url($url, PHP_URL_QUERY)) {
            $embeddedUrl .= '?' . $query;
        }
        $video_name = $embeddedUrl;


        $lesson->update([
            'title' => $request['title'],
            'url' => $video_name,
        ]);
        return redirect()->route('lessons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return  redirect()->route('lessons.index');
    }
}
