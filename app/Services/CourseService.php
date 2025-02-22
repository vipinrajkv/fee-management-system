<?php
namespace App\Services;
use App\Repositories\CourseRepository;
use App\Models\Course;
use DataTables;
use Illuminate\Http\JsonResponse;

class CourseService
{
    public function __construct(protected readonly CourseRepository $courseRepository) {
    }

    /**
     * Course create
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->courseRepository->create($data);
    }

    /**
     * Course update
     *
     * @param array $data
     * @param Course $Course
     * @return void
     */
    public function update(array $data, Course $Course)
    {
        return $this->courseRepository->update($data, $Course);
    }

    /**
     * Course update
     *
     * @param array $data
     * @param Course $Course
     * @return void
     */
    public function delete(Course $Course)
    {
        return $this->courseRepository->delete($Course);
    }    
    
    /**
    * Course create
    *
    * @param array $data
    * @return void
    */
    public function getCourseDetails() : JsonResponse
    {
        $data = Course::with(['user', 'client'])->get();
        
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('user', function ($row) {
                return $row->user->name ?? 'N/A';
            })
            ->addColumn('client', function ($row) {
                return $row->client->client_name ?? 'N/A';
            })
            ->addColumn('deadline', function ($row) {
                return date('d-m-Y', strtotime($row->deadline_at)) ?? 'N/A';
            })
            ->addColumn('action', function ($row) {
                $editUrl = route('Courses.edit', $row->id);
                $deleteUrl = '';
                $btn = '<td><p data-placement="top" data-toggle="tooltip" title="Edit"><a class="btn btn-primary btn-xs" href="' . $editUrl . '" ><span class="glyphicon glyphicon-pencil"></span></a></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs"  href="' . $deleteUrl . '" ><span class="glyphicon glyphicon-trash"></span></button></p></td>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}