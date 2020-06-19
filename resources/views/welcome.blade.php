<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Roshan Survey</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        body {
            font-family: 'Nunito';
        }

        .question {
            font-size: 1.2rem
        }

        .option,
        .question-box {
            display: flex;
            align-items: center;
        }

        img {
            height: 30px;
            width: 30px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1 class="text-center pt-2">Roshan Survey</h1>
        </div>
    </header>
    <hr>
    <main class="pt-5">
        <div class="container">
            @if($completed_surveys->count() > 0)
            <div class="mb-5">
                <h2>Completed Questions</h2>
                @foreach ($completed_surveys as $key => $survey)
                <form class="mb-4 completed-question" data-question="{{ $survey->question->id }}"
                    data-option="{{ $survey->option_id }}">
                    <div class="question">{{ $completed_surveys->firstItem() + $key }})
                        {{ $survey->question->text }}</div>
                    <div class="pt-1 pl-3 options">
                        @foreach ($survey->question->options as $option)
                        <div class="option">
                            <input type="radio" name="{{ $survey->question->id }}" value="{{ $option->id }}"
                                {{ $survey->option_id == $option->id ? 'checked' : '' }} disabled>
                            <div class="ml-2">
                                {{ $option->text }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </form>
                @endforeach
                {{ $completed_surveys->links() }}
            </div>
            @endif

            @if($questions->count() > 0)
            <h2>Other Questions</h2>
            @foreach ($questions as $key => $question)
            <form class="mb-4" data-question="{{ $question->id }}">
                <div class="question">{{ $questions->firstItem() + $key }}) {{ $question->text }}</div>
                <div class="pt-1 pl-3 options">
                    @foreach ($question->options as $option)
                    <div class="option">
                        <input type="radio" name="{{ $question->id }}" value="{{ $option->id }}">
                        <div class="ml-2">
                            {{ $option->text }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </form>
            @endforeach
            @endif
            {{ $questions->links() }}
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        let radios = document.querySelectorAll("input[type='radio']");
        let completed_questions = document.querySelectorAll(".completed-question");

        completed_questions.forEach(function(question){
            let question_id = question.getAttribute('data-question');
            let option_id = question.getAttribute('data-option');
            axios
                .post(`{{ route('survey.completed.getRelated') }}`, {question_id, option_id})
                .then((res) => {
                    if(res.data.success){
                        question.insertAdjacentHTML('beforeend', res.data.html);
                    }
                });
        });

        radios.forEach(function(radio){
                radio.addEventListener('change', function(){
                    let form = radio.closest('form');
                    let questionId = form.getAttribute('data-question');
                    axios
                        .put(`{{ route('survey.store') }}`, {'question_id': questionId, 'option_id': radio.value})
                        .then((res) => {
                            if(res.data.success){
                                form.querySelectorAll("input[type='radio']").forEach((input) => {
                                    input.setAttribute('disabled', true);
                                })
                                form.insertAdjacentHTML('beforeend', res.data.html);
                            }else{
                                alert(res.data.message);
                                radio.checked = false;
                            }
                        })
                });
        })
    </script>
</body>

</html>
