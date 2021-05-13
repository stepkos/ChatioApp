@extends('layouts.leftMenu')

@section('head')

    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">
    <script src="{{ asset('js/scrollToLastMessage.js') }}"></script>

@endsection

@section('content')

    <main>

        <section>
            <div class="left">
                <nav>
                    <header>
                        <div style="float: left;">
                            <h1>All Matches</h1>
                        </div>

                        <div style="float: right;">
                            <img src="{{ asset('images/search.svg')}}" alt="lupa">
                        </div>

                        <div class="clb"></div>
                    </header>


                    @foreach($users as $specUser)
                        <a href="/chat/{{ $specUser['id'] }}">
                            <div class="person">
                                <div>
                                    <img src="{{ asset('images/default-avatar.png') }}" alt="profile picture">
                                </div>
    
                                <div class="info">
                                    <h2>{{ $specUser['name'] }}</h2>
                                    <h3>{{ $specUser['email'] }}</h3>
                                </div>
    
                                <div class="active"></div>
                            </div>
                        </a>
                    @endforeach

                </nav>
            </div>
        </section>

        
        @if ($chat != 0) 

            <section>
                <div class="right">

                    <header>
                        <div>
                            <img src="{{ asset('images/default-avatar.png')}}" alt="profile picture">
                        </div>

                        <div class="info">
                            <h2>{{ $userRecipient['name'] }}</h2>
                            <h3>{{ $userRecipient['email'] }}</h3>
                        </div>

                        <div class="active"></div>
                    </header>

                    <div class="chat">

                        @foreach($messages as $message)

                            @if ($message['user_sender_id'] == $userID )

                                <div class="sent">{{ $message['message'] }}</div>
                                <div class="clb"></div>

                            @else

                                <div class="received">{{ $message['message'] }}</div>
                                <div class="clb"></div>

                            @endif

                        @endforeach

                    </div>

                    <div class="type">
                        <form method="POST" id="formId">
                            @csrf

                            <div class="fieldSet">

                                <div>
                                    <input type="text" name="message" autofocus>
                                    <!-- <input type="submit" value="Send"> -->
                                </div>
                                
                                <div class="icon" onclick="document.getElementById('formId').submit();">
                                    <img src="{{ asset('images/ios-send.png') }}" alt="send">
                                </div>

                                <div class="clb"></div>
                                

                            </div>

                        </form>
                    </div>

                </div>
            </section>

        @endif

        <section class="clb"></section>

    </main>


@endsection
