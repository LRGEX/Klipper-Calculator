<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Klipper extends Controller
{
    public function index()
    {
        $session = session();
        $data = [];

        // Check if there's a 'result' in the session and pass it to the view
        if ($session->has('result')) {
            $data['result'] = $session->get('result');
            $session->remove('result');
        }

        // Load the 'klipper_view' with the data (if any)
        return view('klipper_view', $data);
    }

    public function calculate()
    {
        helper(['form', 'url']);

        $rules = [
            'previousRotationalValue' => 'required|numeric',
            'measuredDistance' => 'required|numeric',
            'targetDistance' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            // Validation failed, redirect back with error messages
            return redirect()->to('/')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get POST data from the form submission
        $previousRotationalValue = $this->request->getPost('previousRotationalValue', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $measuredDistance = $this->request->getPost('measuredDistance', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $targetDistance = $this->request->getPost('targetDistance', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        // Perform the calculation based on the input data 
        $calculationResult = (($previousRotationalValue * $measuredDistance) / $targetDistance);

        // Store the result in the session
        $session = session();
        $session->setFlashdata('result', $calculationResult);

        // Redirect back to the index method, which will display the view with the result
        return redirect()->to('/');
    }

    // Other methods, if necessary...
}
