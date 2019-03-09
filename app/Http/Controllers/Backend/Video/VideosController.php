<?php

namespace App\Http\Controllers\Backend\Video;

use Storage;
use Validator;
use Carbon\Carbon;
use App\Models\Video\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Video\CreateResponse;
use App\Http\Responses\Backend\Video\EditResponse;
use App\Repositories\Backend\Video\VideoRepository;
use App\Http\Requests\Backend\Video\ManageVideoRequest;
use App\Http\Requests\Backend\Video\CreateVideoRequest;
use App\Http\Requests\Backend\Video\StoreVideoRequest;
use App\Http\Requests\Backend\Video\EditVideoRequest;
use App\Http\Requests\Backend\Video\UpdateVideoRequest;
use App\Http\Requests\Backend\Video\DeleteVideoRequest;


/**
 * VideosController
 */
class VideosController extends Controller
{
    /**
     * variable to store the repository object
     * @var VideoRepository
     */
    protected $video;

    /**
     * contructor to initialize repository object
     * @param VideoRepository $repository;
     */
    public function __construct(VideoRepository $video)
    {
        $this->video = $video;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Video\ManageVideoRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageVideoRequest $request)
    {
        return new ViewResponse('backend.videos.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateVideoRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Video\CreateResponse
     */
    public function create(CreateVideoRequest $request)
    {
        return new CreateResponse('backend.videos.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreVideoRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreVideoRequest $request)
    {
        //Input received from the request
        $data=$request->all();
        $rules=[
            'video'          =>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required'];
        $validator = Validator($data,$rules);


        $row = new Video;
        $input = $request->all();

        $file = $request->file('file');

        $attr = array(
            'file' => 'File',

        );
        $rules = array(
           'file' => 'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040',
        );

        $this->validate($request, $rules);
        $validator = Validator::make($input, $rules);
        $validator->setAttributeNames($attr);

        $fileName = $file->getClientOriginalName();
        $uploaded = Storage::putFileAs('public/video', $request->file('file'), $fileName);


        if($uploaded){

            $row->video_name = $fileName;
            $row->title = $request->get('title');
            $row->created_at = Carbon::now();
            $row->save();

        }
        $topic = 'test';

        fcm()
            ->toTopic($topic) // $topic must an string (topic name)
            ->notification([
                'title' => 'New video has been added titled '.$fileName,
                'body' => 'Check it!!',
            ])
            ->send();


        //return with successfull message
        return new RedirectResponse(route('admin.videos.index'), ['flash_success' => trans('alerts.backend.videos.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Video\Video  $video
     * @param  EditVideoRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Video\EditResponse
     */
    public function edit(Video $video, EditVideoRequest $request)
    {
        return new EditResponse($video);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateVideoRequestNamespace  $request
     * @param  App\Models\Video\Video  $video
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->video->update( $video, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.videos.index'), ['flash_success' => trans('alerts.backend.videos.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteVideoRequestNamespace  $request
     * @param  App\Models\Video\Video  $video
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Video $video, DeleteVideoRequest $request)
    {
        //Calling the delete method on repository
        $this->video->delete($video);
        //returning with successfull message
        return new RedirectResponse(route('admin.videos.index'), ['flash_success' => trans('alerts.backend.videos.deleted')]);
    }
    
}
