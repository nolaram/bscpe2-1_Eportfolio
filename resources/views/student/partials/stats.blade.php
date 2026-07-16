<x-stats-card
    title="Daily Attendance"
    :value="$statistics['total_attendance']"
/>

<x-stats-card
    title="Pending"
    :value="$statistics['pending_attendance']"
/>

<x-stats-card
    title="Approved"
    :value="$statistics['approved_attendance']"
/>

<x-stats-card
    title="Hours Rendered"
    :value="$statistics['approved_hours']"
/>