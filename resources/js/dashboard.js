/********************************DASHBOARD********************************/
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

import './dashboards/aside.js';
import './dashboards/section.js';