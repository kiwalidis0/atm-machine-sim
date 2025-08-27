@extends('app/layout')

@section('content')
    <h1>ATM Machine</h1>

    <form id="atm-form">
        @csrf
        <div class="mb-3">
            <label class="form-label">Enter value</label>
            <input id="amount" name="amount" type="number" class="form-control" required>
        </div>
        <button type="submit" id="toggleButton" class="btn btn-primary">Withdraw</button>
    </form>

    <table class="table mt-4" id="result-table">
        <thead>
            <tr>
                <th>Bill</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        document.getElementById('atm-form').addEventListener('submit', async e => {
            e.preventDefault();

            const tbody = document.querySelector('#result-table tbody');

            const res = await fetch('/atm-withdraw', {
                method: 'POST',
                body: new FormData(e.target)
            });

            const data = await res.json();
            console.log(data);

            tbody.innerHTML = '';

            // Handle error case
            if (data.status === 'error') {
                tbody.innerHTML = `<tr>
                    <td colspan="2" class="text-danger">${data.message}</td>
                </tr>`;
                return;
            }
            
            // Handle success case
            if (data.status === 'success') {
                data.bills.forEach(bill => {
                    tbody.innerHTML += `<tr>
                        <td>₱${bill.denomination}</td>
                        <td>${bill.count}</td>
                    </tr>`;
                });
            }
        });
    </script>
@endsection
