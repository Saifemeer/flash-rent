<x-mail::message>
# New Contact Message

You have received a new message from the contact form.

## Sender Details

| Detail | Info |
|:-------|:-----|
| **Name** | {{ $data['name'] }} |
| **Email** | {{ $data['email'] }} |
| **Phone** | {{ $data['phone'] ?? 'Not provided' }} |
| **Subject** | {{ $data['subject'] }} |

## Message

{{ $data['message'] }}

<x-mail::button :url="'mailto:' . $data['email']">
Reply to {{ $data['name'] }}
</x-mail::button>

Regards,<br>
**DriveFleet System**
</x-mail::message>