@extends('client.layout.master')

@section('style-extend')
    <link rel="stylesheet" href="{{ asset('client/vdtt/style.css') }}">
@endsection

@section('content')
    <div id="app-kame">
        <div id="search-kame">
            <input type="text" id="searchInput" placeholder="Nhập câu hỏi">
            <ul id="results"></ul>
        </div>
    </div>
    <div class="text-note-kame">
        <p><i>Nếu có bất kì câu hỏi mới hãy chia sẽ để tôi có thể update thêm vào bộ câu hỏi
                <a rel="nofolow" target="_blank" href="https://forms.gle/fpqQYShyFhCvhuip9">Tại đây</a></i></p>
    </div>
    <div id='list-qa'></div>
@endsection

@section('script-extend')
    <script src="{{ asset("client/vdtt/handle-search.js") }}"></script>
    <script>
        var listQaElement = document.getElementById('list-qa');
        var ulElement = document.createElement('ul');
        
        dataQuestion.forEach(function (qa) {
            var liElement = document.createElement('li');
            var questionHeading = document.createElement('p');
            questionHeading.innerHTML = `<strong><em>${qa.question}</em></strong>`;
            var answerParagraph = document.createElement('p');
            answerParagraph.textContent = "Trả lời: " + qa.answer;
            liElement.appendChild(questionHeading);
            liElement.appendChild(answerParagraph);
            ulElement.appendChild(liElement);
        });

        if (listQaElement) {
            listQaElement.appendChild(ulElement);
        }
    </script>
@endsection
