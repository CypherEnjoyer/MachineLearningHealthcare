<!DOCTYPE html>
<html>
<head>
    <title>Symptom Diagnosis</title>
</head>
<body>
    <h1>Enter Symptoms</h1>
    <form action="/diagnose" method="POST">
        @csrf
        <label><input type="checkbox" name="symptoms[]" value="cough"> Cough</label><br>
        <label><input type="checkbox" name="symptoms[]" value="cold"> Cold</label><br>
        <label><input type="checkbox" name="symptoms[]" value="fever"> Fever</label><br>
        <label><input type="checkbox" name="symptoms[]" value="headache"> Headache</label><br>
        <label><input type="checkbox" name="symptoms[]" value="fatigue"> Fatigue</label><br>
        <label><input type="checkbox" name="symptoms[]" value="nausea"> Nausea</label><br>
        <label><input type="checkbox" name="symptoms[]" value="vomiting"> Vomiting</label><br>
        <label><input type="checkbox" name="symptoms[]" value="diarrhea"> Diarrhea</label><br>
        <label><input type="checkbox" name="symptoms[]" value="sore throat"> Sore Throat</label><br>
        <label><input type="checkbox" name="symptoms[]" value="shortness of breath"> Shortness of Breath</label><br>
        <button type="submit">Diagnose</button>
    </form>
</body>
</html>