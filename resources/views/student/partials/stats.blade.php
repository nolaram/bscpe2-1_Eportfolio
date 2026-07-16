<div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">

    <x-stats-card
        title="Daily Attendance"
        :value="$statistics['total_attendance']"
    />

    <x-stats-card
        title="Hours Rendered"
        :value="$statistics['total_hours']"
    />

    <x-stats-card
        title="Remaining Hours"
        :value="$statistics['remaining_hours']"
    />

    <x-stats-card
        title="Required Hours"
        :value="$statistics['required_hours']"
    />

</div>