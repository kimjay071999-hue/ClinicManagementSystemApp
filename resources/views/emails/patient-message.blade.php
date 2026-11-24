<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Patient Message</title>
</head>

<body style="margin: 0; padding: 30px; background-color: #f1f5f9; font-family: Arial, sans-serif;">

    <div style="
        max-width: 600px;
        margin: auto;
        background: white;
        border-radius: 12px;
        padding: 30px;
        border: 1px solid #e2e8f0;
    ">

       <h1 class="text-lg sm:text-xl font-bold text-slate-800">
                            <img src="{{ asset('img/clinic_logo.png') }}" alt="">
                        </h1>

        <p style="color: #475569;">
            You received a new message from a patient.
        </p>

        <hr style="border: 0; border-top: 1px solid #e2e8f0;">

        <p>
            <strong>Patient:</strong>
            {{ $patientName }}
        </p>

        <p>
            <strong>Email:</strong>
            {{ $patientEmail }}
        </p>

        <p>
            <strong>Subject:</strong>
            {{ $messageSubject }}
        </p>

        <div style="
            margin-top: 20px;
            padding: 20px;
            background: #f8fafc;
            border-radius: 10px;
            color: #334155;
        ">
            <strong>Message:</strong>

            <p style="white-space: pre-line;">
                {{ $messageText }}
            </p>
        </div>

        <p style="
            margin-top: 30px;
            font-size: 13px;
            color: #64748b;
        ">
            This message was sent through the Clinic Management System.
        </p>

    </div>

</body>
</html>