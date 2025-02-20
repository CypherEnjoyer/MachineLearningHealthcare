<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Diagnosis;

class DiagnosisController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function diagnose(Request $request)
    {
        $symptoms = $request->input('symptoms');
        $diagnosis = $this->getDiagnosis($symptoms);

        // Save to database
        Diagnosis::create([
            'symptoms' => implode(', ', $symptoms),
            'diagnosis' => json_encode($diagnosis),
        ]);

        return view('result', ['diagnosis' => $diagnosis, 'symptoms' => $symptoms]);
    }

    private function getDiagnosis($symptoms)
    {
        try {
            Log::info('Sending symptoms to API', ['symptoms' => $symptoms]);
            $response = Http::post('http://127.0.0.1:5000/diagnose', [
                'symptoms' => $symptoms,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Received response from API', ['response' => $data]);
                if (isset($data['diagnoses'])) {
                    return $data['diagnoses'];
                } else {
                    Log::error('Diagnoses key not found in response', ['response' => $data]);
                    return 'Error: Diagnoses key not found in response';
                }
            } else {
                Log::error('API request failed', [
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                return 'Error: API request failed';
            }
        } catch (\Exception $e) {
            Log::error('Exception occurred while making API request', ['exception' => $e->getMessage()]);
            return 'Error: Exception occurred while making API request';
        }
    }
}

