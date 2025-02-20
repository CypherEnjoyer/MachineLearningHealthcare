<!-- filepath: /resources/views/result.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Diagnosis Result</title>
</head>
<body>
    <h1>Diagnosis Result</h1>
    
    <h2>Selected Symptoms</h2>
    <ul>
        @foreach($symptoms as $symptom)
            <li>{{ $symptom }}</li>
        @endforeach
    </ul>

    <h2>Diagnosis</h2>
    @if(is_array($diagnosis))
        <ul>
            @foreach($diagnosis as $diag)
                <li>{{ $diag['disease'] }}: {{ number_format($diag['probability'] * 100, 2) }}%</li>
            @endforeach
        </ul>
    @else
        <p>{{ $diagnosis }}</p>
    @endif

    <form action="{{ url('/') }}" method="get">
        <button type="submit">Make Another Diagnosis</button>
    </form>
</body>
</html>