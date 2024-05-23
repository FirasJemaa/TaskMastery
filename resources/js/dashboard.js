/********************************DASHBOARD********************************/
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

import './dashboard/aside.js';
import './dashboard/section.js';
import './attribution.js';