@extends('Admin.layout')

@section('main')
    <div class="content-wrapper custom-height">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Chat Customer Support</h3>
                </div>
                <div class="box-body">
                    <div class="row custom-flex">
                        <div class="col-md-12">
                            <div class="chat-view">
                                <div class="chat-head">
                                    <div class="chatuser-image">
                                        <img src="{{ asset('images/pro-img.png') }}" alt="" />
                                    </div>
                                    <div class="chatuser-name">
                                        <h6>{{ $user->first_name }} {{ $user->last_name }}</h6>
                                        <p>
                                            @isset($user->created_at)
                                                {{ $user->created_at->format('F') }}
                                                {{ $user->created_at->year }}
                                            @endisset
                                        </p>
                                    </div>
                                </div>
                                <div class="chat-msg">

                                    @foreach ($customerallMessages as $message)
                                        <div class="{{ $message->is_user == 1 ? 'chat-inner-1' : 'chat-inner-2' }}">
                                            <div class="chat-pop">
                                                @if ($message->file_name != null)
                                                    <p class="m-0 mb-1">
                                                        <a href="{{ $message->customer_support_attachment }}" download>
                                                            <img src="{{ $message->customer_support_attachment }}"
                                                                style="width: 100%; max-width: 200px; border-radius: 10px"
                                                                alt="" loading="lazy" decoding="async">
                                                        </a>
                                                    </p>
                                                @endif
                                                {{ $message->message }}
                                            </div>
                                            <div class="chat-date">
                                                <span class="">
                                                    {{ $message->created_at . '-' . $message->name }}
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="new_msg chat-inner-2">

                                    </div>

                                </div>
                                <div class="chat-field">
                                    <div class="chat-fieldleft">
                                        <input type="text" class="form-control chat-text" placeholder="Text...">
                                    </div>
                                    <div class="chat-fieldright">
                                        <a href="javascript:void(0)" data-user="<?= $user->id ?>" class="send-btn chat"><i
                                                class="fa fa-paper-plane"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('backend/js/intl-tel-input-13.0.0/build/js/intlTelInput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/js/isValidPhoneNumber.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        const msgBox = document.querySelector(".chat-msg")
        msgBox.scrollTo(0, msgBox.scrollHeight)

        $(document).on('click', '.chat', function(e) {
            var msg = $('.chat-text').val();
            var user_id = $(this).data('user');
            var result = '<div class="chat-pop">' +
                sanitize(msg) +
                '</div>' + '<div class="chat-date">' +
                '<span class="">just now</span>' +
                '</div>'


            $.ajax({
                url: "{{route('admin.customer.support.message')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'msg': msg,
                    'user_id': user_id,
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    console.table(data);

                    $('.new_msg').append(result);

                    $('.chat-text').val("");
                },
                error: function(xhr, status, error) {
                    console.table(xhr.responseText);
                }
            })
        });

        $(".chat-text").on('keyup', function(event) {
            if (event.which === 13) {
                $('.chat').trigger("click");
            }
        });

        function sanitize(string) {
            const symbols = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#x27;',
                "/": '&#x2F;',
            };
            const regex = /[&<>"'/]/ig;
            return string.replace(regex, (match) => (symbols[match]));
        }
    </script>
@endpush
