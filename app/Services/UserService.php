<?php
namespace App\Services;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use DataTables;
class UserService
{
    protected $userRepository;

    /**
     * UserService Constructor
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * User create
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->userRepository->create($data);
    }

    /**
     * user update
     *
     * @param array $data
     * @param User $user
     * @return void
     */
    public function update(array $data, User $user)
    {

        return $this->userRepository->update($data, $user);
    }

    /**
     * user update
     *
     * @param array $data
     * @param User $user
     * @return void
     */
    public function delete(User $user)
    {
        return $this->userRepository->delete($user);
    }


    /**
    * User Details
    *
    * @param array $data
    * @return void
    */
    public function getUserDetails() : JsonResponse
    {
        $data = User::query();
        
        return Datatables::of($data)
            ->addIndexColumn()
            // ->addColumn('user', function ($row) {
            //     return $row->user->name ?? 'N/A';
            // })
            // ->addColumn('client', function ($row) {
            //     return $row->client->client_name ?? 'N/A';
            // })
            // ->addColumn('deadline', function ($row) {
            //     return date('d-m-Y', strtotime($row->deadline_at)) ?? 'N/A';
            // })
            ->addColumn('action', function ($row) {
                $editUrl = route('projects.edit', $row->id);
                $deleteUrl = '';
                $btn = '<td><p data-placement="top" data-toggle="tooltip" title="Edit"><a class="btn btn-primary btn-xs" href="' . $editUrl . '" ><span class="glyphicon glyphicon-pencil"></span></a></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs"  href="' . $deleteUrl . '" ><span class="glyphicon glyphicon-trash"></span></button></p></td>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}