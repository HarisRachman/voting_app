<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <link rel="stylesheet" href="{{ asset('resource/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>Voting System</h1>

        <h2>Leaderboard</h2>
        @foreach ($leaderboards as $lead)
            <div id="leaderboard" class="leaderboard">
                <div class="card">
                    <img src="{{$lead->image}}" alt="{{ $lead->nama }}">
                    <div class="info">
                        <h3>{{ $lead->nama }}</h3>
                        <p class="region">{{ $lead->daerah }}</p>
                    </div>
                    <span class="votes">Votes: {{ $lead->jml_vote }}</span>
                </div>
            </div>
        @endforeach

        <h2>Contestants</h2>
        <div class="candidates">
            @foreach ($candidates as $cand)
                <div class="candidate">
                    <img src="{{$cand->image}}" alt="{{ $cand->nama }}" class="candidate-img">
                    <h2>{{ $cand->nama }}</h2>
                    <h4>{{ $cand->daerah }}</h4>
                    <p>Total Vote: {{ $cand->jml_vote }} </p>
                    <button class="vote-btn" data-id="{{ $cand->id }}" data-candidate="{{ $cand->nama }}" data-image="{{$cand->image}}" data-price="2500">Vote</button>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div id="voteModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-body">
                <div class="modal-left">
                    <img id="modalImage" src="" alt="Kandidat Image" class="modal-img">
                </div>
                <div class="modal-right">
                    <h2 id="candidateName">Nama Kandidat</h2>
                    <p id="pricePerVote">Harga per Vote: <span id="priceValue">0</span> </p>
                    
                    <hr>

                    <form method="POST" action="{{ route('vote.store') }}">
                        @csrf
                        <h3>Informasi Voter:</h3>
                        <input type="hidden" id="idCandidate" name="id_candidate">
                        <input type="hidden" id="amount" name="amount">

                        <label for="voterName">Nama Voter:</label>
                        <input type="text" id="voterName" name="nama_voter" placeholder="Nama Voter">
                        
                        <label for="voterPhone">Telepon Voter:</label>
                        <input type="tel" id="voterPhone" name="telp_voter" placeholder="Telepon Voter">
                        
                        <hr>

                        <label for="voteCount">Jumlah Vote:</label>
                        <input type="number" id="voteCount" name="jml_vote" min="1" value="1">
                        
                        <h4>Total Harga: <span id="totalPrice">0</span></h4>
                        
                        <button type="submit" id="submitVote">Submit Vote</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('resource/scripts.js') }}"></script>
</body>
</html>
