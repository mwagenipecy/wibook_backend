<?php

namespace App\Services;

use App\Models\ProjectTransaction;


class TotalIncomeService
{
    /**
     * Get the total expenditure for a given project.
     *
     * @param int $projectId
     * @return float
     */
    public function getTotalExpenditure(int $projectId): float
    {
        return ProjectTransaction::where('project_id', $projectId)
             ->where('type','income')->sum('amount');
    }

    /**
     * Get the monthly income for each month of the year for a given project.
     *
     * @param int $projectId
     * @return array
     */
    public function getMonthlyIncome(int $projectId): array
    {
        // Get the monthly total income for the specified project
        $monthlyIncome = ProjectTransaction::selectRaw('MONTH(created_at) as month, SUM(amount) as total')
            ->where('project_id', $projectId)
            ->where('type', 'income')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total', 'month')
            ->toArray();
    
        // Define the months array with month names
        $months = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        ];
    
        // Initialize result array with months and corresponding totals
        $result = [];
        foreach ($months as $month => $monthName) {
            $result[] = [
                'month' => $monthName,
                'total' => $monthlyIncome[$month] ?? 0.0
            ];
        }
    
        return $result;
    }
    
}