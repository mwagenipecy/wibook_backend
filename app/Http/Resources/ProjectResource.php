<?php

namespace App\Http\Resources;

use App\Services\UserServices;
use App\Services\TotalExpenditureService;

use App\Services\TotalIncomeService;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        // user services
        $userService=new UserServices();
        $expenditureService = new TotalExpenditureService();
        $incomeService = new TotalIncomeService();

      

        return [
            "id"=> $this->id,
            "name"=>$this->name,
            "description"=> $this->description?? "N/A",
            "status"=>$this->active,
            "location"=> $this->location,
            'number_of_users'=>  $userService->getTotalUsersInProject($this->id),
            "totalExpenditure"=>$expenditureService->getTotalExpenditure($this->id),
            "expenditureByMonth"=>$expenditureService->getMonthlyExpenditure($this->id),
            "totalIncome"=> $incomeService->getTotalExpenditure($this->id),
            "incomeByMonths"=> $incomeService->getMonthlyIncome($this->id),
        ];
    }
}
