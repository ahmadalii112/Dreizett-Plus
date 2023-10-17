<?php

namespace App\Http\Service\ResidentialCommunity;

use App\Http\Repositories\ResidentialCommunity\ResidentialCommunityRepository;
use App\Http\Service\BaseService;
use Yajra\DataTables\DataTables;

class ResidentialCommunityService extends BaseService
{
    public function __construct(ResidentialCommunityRepository $residentialCommunityRepository)
    {
        $this->repository = $residentialCommunityRepository;
    }

    public function getDatatables($data)
    {
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('rooms', fn ($row) => $row->rooms->count() ?? 'N/A')
            ->addColumn('created_by', fn ($row) => $row?->user->full_name ?? 'N/A')
            ->addColumn('action', fn ($residentialCommunity) => \view('residential-communities.partials.table-action', compact('residentialCommunity'))->render())
            ->make(true);
    }
}
