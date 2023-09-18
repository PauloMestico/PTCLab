@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light">
                            <thead>
                            <tr>
                                <th>@lang('User')</th>
                                <th>@lang('Limit')</th>
                                <th>@lang('Month')</th>
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->user->firstname." ".$user->user->lastname }}
                                    </td>

                                    <td>
                                        {{ $user->limit }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($user->year_month)->format('F') }}
                                    </td>
                                    <td>
                                        <button class="btn btn-outline--primary btn-sm planBtn"
                                                data-id="{{ $user->user->id }}" data-act="Edit">
                                            <i class="la la-pencil"></i> @lang('Set Limit')
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                            @endforeach
                            {{--                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>--}}

                            </tbody>
                        </table>
                        <!-- table end -->
                    </div>
                </div>
                @if ($users->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($users) }}
                    </div>
                @endif
            </div>
            <!-- card end -->
        </div>
    </div>
    @foreach($users as $user)

        <div class="modal fade" id="planModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><span class="act"></span> @lang('Set Referral Limit')</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="las la-times"></i>
                        </button>
                    </div>
                    <form action="{{ route('admin.refer.update') }}" method="POST">
                        @csrf
                        <input type="text" id="modalUserId" name="userId" hidden>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="daily_limit">@lang('Set Limit')</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="limit" placeholder="@lang('limit')"
                                           required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="details">@lang('Select Month') </label>
                                <input type="date" class="form-control" name="year_month"
                                       placeholder="@lang('Select Month')"
                                       required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn--primary w-100">@lang('Submit')</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endforeach

@endsection

@push('script')
    <script>
        (function ($) {
            "use strict";
            $('.planBtn').on('click', function () {
                var modal = $('#planModal');
                // console.log($(this).data('id'));
                $('#modalUserId').val($(this).data('id'));
                if ($(this).data('id') == 0) {
                    modal.find('form')[0].reset();
                }
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
