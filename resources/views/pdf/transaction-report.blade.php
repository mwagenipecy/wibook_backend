<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12px;
            line-height: 1.4;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #4F46E5;
            padding-bottom: 20px;
        }
        
        .header h1 {
            color: #4F46E5;
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        
        .header h2 {
            color: #6B7280;
            margin: 5px 0 0 0;
            font-size: 16px;
            font-weight: normal;
        }
        
        .report-info {
            display: table;
            width: 100%;
            margin-bottom: 30px;
        }
        
        .report-info-left, .report-info-right {
            display: table-cell;
            width: 50%;
            vertical-align: top;
        }
        
        .report-info-right {
            text-align: right;
        }
        
        .info-item {
            margin-bottom: 8px;
        }
        
        .info-label {
            font-weight: bold;
            color: #374151;
        }
        
        .info-value {
            color: #6B7280;
        }
        
        .summary-section {
            margin-bottom: 30px;
        }
        
        .summary-cards {
            display: table;
            width: 100%;
            border-collapse: separate;
            border-spacing: 15px 0;
        }
        
        .summary-card {
            display: table-cell;
            width: 33.33%;
            padding: 15px;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            text-align: center;
            background-color: #F9FAFB;
        }
        
        .summary-card.income {
            border-color: #10B981;
            background-color: #F0FDF4;
        }
        
        .summary-card.expense {
            border-color: #EF4444;
            background-color: #FEF2F2;
        }
        
        .summary-card.profit {
            border-color: #3B82F6;
            background-color: #EFF6FF;
        }
        
        .summary-title {
            font-size: 11px;
            color: #6B7280;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .summary-amount {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }
        
        .summary-amount.income {
            color: #10B981;
        }
        
        .summary-amount.expense {
            color: #EF4444;
        }
        
        .summary-amount.profit {
            color: #3B82F6;
        }
        
        .summary-amount.loss {
            color: #EF4444;
        }
        
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #374151;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 1px solid #E5E7EB;
        }
        
        .transactions-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        
        .transactions-table th,
        .transactions-table td {
            padding: 8px 12px;
            text-align: left;
            border-bottom: 1px solid #E5E7EB;
        }
        
        .transactions-table th {
            background-color: #F9FAFB;
            font-weight: bold;
            color: #374151;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .transactions-table td {
            color: #6B7280;
        }
        
        .amount {
            font-weight: bold;
            text-align: right;
        }
        
        .amount.income {
            color: #10B981;
        }
        
        .amount.expense {
            color: #EF4444;
        }
        
        .transaction-type {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        .transaction-type.income {
            background-color: #D1FAE5;
            color: #065F46;
        }
        
        .transaction-type.expense {
            background-color: #FEE2E2;
            color: #991B1B;
        }
        
        .category-badge {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 9px;
            background-color: #F3F4F6;
            color: #6B7280;
        }
        
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #E5E7EB;
            text-align: center;
            color: #9CA3AF;
            font-size: 10px;
        }
        
        .no-transactions {
            text-align: center;
            padding: 40px;
            color: #6B7280;
            font-style: italic;
        }
        
        @media print {
            body {
                margin: 0;
                padding: 15px;
            }
            
            .summary-cards {
                border-spacing: 10px 0;
            }
            
            .summary-card {
                page-break-inside: avoid;
            }
            
            .transactions-table {
                page-break-inside: auto;
            }
            
            .transactions-table tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>Transaction Report</h1>
        <h2>{{ $reportData['project_name'] ?? 'All Projects' }}</h2>
    </div>

    <!-- Report Information -->
    <div class="report-info">
        <div class="report-info-left">
            <div class="info-item">
                <span class="info-label">Generated By:</span>
                <span class="info-value">{{ $reportData['user_name'] }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Generated On:</span>
                <span class="info-value">{{ $reportData['generated_at'] }}</span>
            </div>
            @if(isset($reportData['project_name']))
            <div class="info-item">
                <span class="info-label">Project:</span>
                <span class="info-value">{{ $reportData['project_name'] }}</span>
            </div>
            @endif
        </div>
        <div class="report-info-right">
            <div class="info-item">
                <span class="info-label">Report Period:</span>
                <span class="info-value">{{ $reportData['period'] }}</span>
            </div>
            @if(isset($reportData['transaction_type']) && $reportData['transaction_type'] !== 'all')
            <div class="info-item">
                <span class="info-label">Transaction Type:</span>
                <span class="info-value">{{ ucfirst($reportData['transaction_type']) }}</span>
            </div>
            @endif
            <div class="info-item">
                <span class="info-label">Total Records:</span>
                <span class="info-value">{{ count($reportData['transactions']) }}</span>
            </div>
        </div>
    </div>

    <!-- Summary Section -->
    <div class="summary-section">
        <div class="section-title">Financial Summary</div>
        <div class="summary-cards">
            <div class="summary-card income">
                <div class="summary-title">Total Income</div>
                <div class="summary-amount income">TZS {{ number_format($reportData['summary']['total_income'], 0) }}</div>
            </div>
            <div class="summary-card expense">
                <div class="summary-title">Total Expenses</div>
                <div class="summary-amount expense">TZS {{ number_format($reportData['summary']['total_expense'], 0) }}</div>
            </div>
            <div class="summary-card profit">
                <div class="summary-title">Net {{ $reportData['summary']['net_profit'] >= 0 ? 'Profit' : 'Loss' }}</div>
                <div class="summary-amount {{ $reportData['summary']['net_profit'] >= 0 ? 'profit' : 'loss' }}">
                    TZS {{ number_format(abs($reportData['summary']['net_profit']), 0) }}
                </div>
            </div>
        </div>
    </div>

    <!-- Transactions Section -->
    <div class="section-title">Transaction Details</div>
    
    @if(count($reportData['transactions']) > 0)
        <table class="transactions-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Project</th>
                    <th>Amount (TZS)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reportData['transactions'] as $transaction)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($transaction['created_at'])->format('M d, Y') }}</td>
                    <td>{{ $transaction['description'] ?? 'No description' }}</td>
                    <td>
                        <span class="transaction-type {{ $transaction['type'] }}">
                            {{ ucfirst($transaction['type']) }}
                        </span>
                    </td>
                    <td>
                        @if(isset($transaction['category']) && $transaction['category'])
                            <span class="category-badge">{{ $transaction['category']['name'] }}</span>
                        @else
                            <span class="category-badge">Uncategorized</span>
                        @endif
                    </td>
                    <td>{{ $transaction['project']['name'] ?? 'N/A' }}</td>
                    <td class="amount {{ $transaction['type'] }}">
                        {{ $transaction['type'] === 'income' ? '+' : '-' }}{{ number_format($transaction['amount'], 0) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-transactions">
            No transactions found for the selected criteria.
        </div>
    @endif

    @if(count($reportData['monthly_breakdown']) > 0)
    <!-- Monthly Breakdown Section -->
    <div class="section-title">Monthly Breakdown</div>
    <table class="transactions-table">
        <thead>
            <tr>
                <th>Month</th>
                <th>Income (TZS)</th>
                <th>Expenses (TZS)</th>
                <th>Net (TZS)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportData['monthly_breakdown'] as $month)
            <tr>
                <td>{{ $month['month'] }}</td>
                <td class="amount income">{{ number_format($month['income'], 0) }}</td>
                <td class="amount expense">{{ number_format($month['expense'], 0) }}</td>
                <td class="amount {{ $month['net'] >= 0 ? 'income' : 'expense' }}">
                    {{ $month['net'] >= 0 ? '+' : '' }}{{ number_format($month['net'], 0) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    <!-- Footer -->
    <div class="footer">
        <p>This report was generated by WiBook App on {{ $reportData['generated_at'] }}</p>
        <p>© {{ date('Y') }} WiBook - Business Financial Management System</p>
    </div>
</body>
</html>

