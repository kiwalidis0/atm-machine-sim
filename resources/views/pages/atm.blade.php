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

    <table class="table" id="result-table">
        <thead>
            <tr>
                <th>Bill</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    

<script>
document.getElementById('atm-form').addEventListener(
    'submit', async e => {
        e.preventDefault();
        const tbody = document.querySelector('#result-table tbody');
        const res = await fetch('/atm-withdraw', {
            method: 'POST',
            body: new FormData(e.target)
        });
        const data = await res.json();
        console.log(data);
        

        tbody.innerHTML = '';

        if (!data.ok){
            tbody.innerHTML = `<tr><td colspans="2" class="text-secondary">
            ${data.bills}</td></tr>`;
            return;
        }
        
        data.breakdown.forEach(line => {
            const match = line.match(/(\d+).*₱(\d+)/);
            if(match){
                tbody.innerHTML += `<tr><td>₱${match[2]}</td></tr>`;
            }
        });
    }
);
</script>
@endsection