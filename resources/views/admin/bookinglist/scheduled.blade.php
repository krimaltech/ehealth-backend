@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Scheduled Appointment
                        List</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Scheduled Appointment List</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>User</th>
                        <th>Phone No.</th>
                        <th>Service Type</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->member->user->name }}</td>
                            <td>{{ $item->member->user->phone }}</td>
                            <td>{{ $item->doctor_service_type }}</td>
                            <td>{{ $item->slot->bookings->date }}</td>
                            <td>{{ $item->slot->slot }}</td>
                            <td>{{ $item->messages }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if ($item->doctor_service_type == 'In Video')
                                            @if ($item->meeting == null)
                                                <button type="button" class="dropdown-item" data-toggle="modal"
                                                    data-target="#meetingModal_{{ $item->id }}">
                                                    <i class="icon-plus2"></i>Add Meeting
                                                </button>
                                            @elseif (
                                                $item->slot->slot <= \Carbon\Carbon::now()->format('A:i:g') &&
                                                    $item->slot->bookings->date == \Carbon\Carbon::now()->format('Y-m-d'))
                                                <a href="{{ $item->meeting->start_url }}" target="_blank"
                                                    class="dropdown-item"><i class="icon-play"></i>Start
                                                    Meeting</a>
                                            @endif
                                        @endif
                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                            data-target="#scheduleCompletedModal_{{ $item->id }}">
                                            <i class="icon-plus-circle2"></i>Add Medical Note
                                        </button>
                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                            data-target="#scheduleCancelledModal_{{ $item->id }}">
                                            <i class="icon-cross2"></i>Cancel
                                        </button>
                                        <form action="{{ route('scheduled.completedappointment', $item->id) }}"
                                            method="post">
                                            @csrf
                                            @method('patch')
                                            <button type="submit" class="dropdown-item"> <i
                                                    class="icon-checkmark3"></i>Complete</button>
                                        </form>
                                        <a href="{{ route('scheduled.details', $item->id) }}" class="dropdown-item"><i
                                                class="icon-eye2"></i> View </a>
                                    </div>
                                    <!--Add Meeting Modal-->
                                    <div class="modal fade" id="meetingModal_{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="meetingModalModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Meeting Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('meetings.create') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="booking_id" value="{{ $item->id }}">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="form-label">Topic<code>*</code></label>
                                                            <input type="text" class="form-control" name="topic"
                                                                value="Doctor User Meeting" value="{{ old('topic') }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Start Time<code>*</code></label>
                                                            <span>{{ $item->slot->bookings->date }}</span>
                                                            <span>{{ $item->slot->slot }}</span>
                                                            <input type="datetime-local" class="form-control"
                                                                name="start_time" value="{{ old('start_time') }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Agenda<code>*</code></label>
                                                            <input type="text" class="form-control" name="agenda"
                                                                value="Meeting with doctor" value="{{ old('agenda') }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            Meeting</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Medical Note Modal-->
                                    <div class="modal fade" id="scheduleCompletedModal_{{ $item->id }}"
                                        tabindex="-1" role="dialog" aria-labelledby="scheduleCompletedModalTitle"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add your
                                                        recommendation
                                                        or pescription</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('scheduled.completed', $item->id) }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">History</label>
                                                            <textarea type="text" name="history" id="history" class="summernote form-control" cols="30"
                                                                rows="8">{{ $item->report?$item->report->history:''}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Examination</label>
                                                            <textarea type="text" name="examination" id="examination" class="summernote form-control" cols="30"
                                                                rows="8">{{ $item->report?$item->report->examination:''}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Treatment</label>
                                                            <textarea type="text" name="treatment" id="treatment" class="summernote form-control" cols="30"
                                                                rows="8">{{ $item->report?$item->report->treatment:''}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Progress</label>
                                                            <textarea type="text" name="progress" id="progress" class="summernote form-control" cols="30"
                                                                rows="8">{{ $item->report?$item->report->progress:''}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Follow Up Date</label>
                                                            <input type="date" name="followUpDate">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Related File or Image</label>
                                                            <input type="file" name="image">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id" />
                                                        <input type="hidden" name="booking_id" id="booking_id"
                                                            value="{{ $item->id }}" />
                                                        <div id="autoSave"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Cancel Modal-->
                                    <div class="modal fade" id="scheduleCancelledModal_{{ $item->id }}"
                                        tabindex="-1" role="dialog" aria-labelledby="scheduleCancelledModalTitle"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Reason of
                                                        cancellation
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('scheduled.cancelled', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Reason <code>*</code></label>
                                                            <textarea name="cancel_reason" class="summernote form-control" cols="30" rows="8" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            {{-- <td>
                                @if ($item->meeting == null)
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#meetingModal_{{ $item->id }}">
                                        Add Meeting
                                    </button>
                                    <div class="modal fade" id="meetingModal_{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="meetingModalModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Meeting Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('meetings.create') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="booking_id" value="{{ $item->id }}">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="form-label">Topic<code>*</code></label>
                                                            <input type="text" class="form-control" name="topic"
                                                                value="Doctor User Meeting" value="{{ old('topic') }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Start Time<code>*</code></label>
                                                            <span>{{ $item->slot->bookings->date }}</span>
                                                            <span>{{ $item->slot->slot }}</span>
                                                            <input type="datetime-local" class="form-control"
                                                                name="start_time" value="{{ old('start_time') }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Agenda<code>*</code></label>
                                                            <input type="text" class="form-control" name="agenda"
                                                                value="Meeting with doctor" value="{{ old('agenda') }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save Meeting</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($item->slot->slot <= \Carbon\Carbon::now()->format('A:i:g') &&
                                    $item->slot->bookings->date == \Carbon\Carbon::now()->format('Y-m-d'))
                                    <a href="{{ $item->meeting->start_url }}" target="_blank" class="btn btn-primary">Start
                                        Meeting</a>
                                @endif
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#scheduleCompletedModal_{{ $item->id }}">
                                    Add Medical Note
                                </button>
                                <div class="modal fade" id="scheduleCompletedModal_{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="scheduleCompletedModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Add your recommendation
                                                    or pescription</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('scheduled.completed', $item->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">History</label>
                                                    <textarea type="text" name="history" id="history" class="summernote form-control" cols="30"
                                                        rows="8"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Examination</label>
                                                    <textarea type="text" name="examination" id="examination" class="summernote form-control" cols="30"
                                                        rows="8"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Treatment</label>
                                                    <textarea type="text" name="treatment" id="treatment" class="summernote form-control" cols="30"
                                                        rows="8"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Progress</label>
                                                    <textarea type="text" name="progress" id="progress" class="summernote form-control" cols="30"
                                                        rows="8"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Follow Up Date</label>
                                                    <input type="date" name="followUpDate">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Related File or Image</label>
                                                    <input type="file" name="image">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="id" id="id" />
                                                <input type="hidden" name="booking_id" id="booking_id"
                                                    value="{{ $item->id }}" />
                                                <div id="autoSave"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#scheduleCancelledModal_{{ $item->id }}">
                                    Cancel
                                </button>
                                <div class="modal fade" id="scheduleCancelledModal_{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="scheduleCancelledModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Reason of cancellation
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('scheduled.cancelled', $item->id) }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Reason <code>*</code></label>
                                                        <textarea name="cancel_reason" class="summernote form-control" cols="30" rows="8" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{route('scheduled.completedappointment',$item->id)}}" method="post">
                                    @csrf
                                    @method('patch')
                                    <button type="submit" class="btn btn-success">Complete</button>
                                </form>
                                <a href="{{route('scheduled.details',$item->id)}}" class="btn btn-primary"><i class="icon-eye2"></i> </a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('custom-script')
    <!-- Summernote -->
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote()
        })
    </script>

    <script>
        $(document).ready(function() {
            function autoSave() {
                var booking_id = $('#booking_id').val();
                var history = $('#history').val();
                var examination = $('#examination').val();
                var treatment = $('#treatment').val();
                var progress = $('#progress').val();
                if (booking_id != '' && history != '' || examination != '' || treatment != '' && progress != '') {
                    var url = '{{ route('scheduled.completed', ':booking_id') }}';
                    url = url.replace(':booking_id', booking_id);
                    $.ajax({
                        url: url,
                        method: "patch",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            booking_id: booking_id,
                            history: history,
                            examination: examination,
                            treatment: treatment,
                            progress: progress
                        },
                        dataType: "text",
                        success: function(data) {
                            if (data != '') {
                                $('#booking_id').val(data);
                            }
                            $('#autoSave').text("saveing as draft...");
                            setInterval(function() {
                                $('#autoSave').text('');
                            }, 10000);
                        }
                    });
                }
            }
            setInterval(function() {
                autoSave();
            }, 5000);
        });
    </script>
@endsection
