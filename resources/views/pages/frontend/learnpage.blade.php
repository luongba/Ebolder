<!doctype html>
<html lang="en">
@include('layouts.head')
<style>
    /* grammar */
    .bg-grammar {
        background-color: #2162FF;
        color: #fff!important
    }
    .bg-grammar .bg-grammar-tag {
        background: rgb(245 245 245 / 20%);
    }
    .bg-grammar .bg-grammar-tag,
    .bg-grammar .bg-grammar-tag svg * {
        color: #fff!important;
        fill: #fff!important;
    }
    .bg-grammar-tag, .bg-grammar-tag svg * {
        background-color: #d3e0ff;
        color: #2162FF;
        fill: #2162FF;
    }
    .border-grammar, .radio-grammar {
        border-color: #2162FF;
        accent-color: #2162FF
    }

    /* pronunciation */
    .bg-pronunciation {
        background-color: #2162FF;
    }
    .bg-pronunciation .bg-pronunciation-tag {
        background: rgb(245 245 245 / 20%);
    }
    .bg-pronunciation .bg-pronunciation-tag,
    .bg-pronunciation .bg-pronunciation-tag svg * {
        color: #fff!important;
        fill: #fff!important;
    }
    .bg-pronunciation-tag, .bg-pronunciation-tag svg * {
        background-color: #d3e0ff;
        color: #2162FF;
        fill: #2162FF;
    }
    .border-pronunciation, .radio-pronunciation {
        border-color: #2162FF;
        accent-color: #2162FF
    }

    /* vocabulary */
    .bg-vocabulary {
        background-color: #d35924;
    }
    .bg-vocabulary .bg-vocabulary-tag {
        background: rgb(245 245 245 / 20%);
    }
    .bg-vocabulary .bg-vocabulary-tag,
    .bg-vocabulary .bg-vocabulary-tag svg * {
        color: #fff!important;
        fill: #fff!important;
    }
    .bg-vocabulary-tag, .bg-vocabulary-tag svg * {
        background-color: #f6ded3;
        color: #D35924;
        fill: #D35924;
    }
    .border-vocabulary, .radio-vocabulary {
        border-color: #D35924;
        accent-color: #D35924
    }

    /* listening */
    .bg-listening {
        background-color: #2162FF;
    }
    .bg-listening .bg-listening-tag {
        background: rgb(245 245 245 / 20%);
    }
    .bg-listening .bg-listening-tag,
    .bg-listening .bg-listening-tag svg * {
        color: #fff!important;
        fill: #fff!important;
    }
    .bg-listening-tag, .bg-listening-tag svg * {
        background-color: #d3d0ff;
        color: #2162FF;
        fill: #2162FF;
    }
    .border-listening, .radio-listening {
        border-color: #2162FF;
        accent-color: #2162FF
    }


    /* speaking */
    .bg-speaking {
        background-color: #d35924;
    }
    .bg-speaking-tag, .bg-speaking-tag svg * {
        background-color: #f6ded3;
        color: #D35924;
        fill: #D35924;
    }
    .border-speaking, .radio-speaking {
        border-color: #D35924;
        accent-color: #D35924
    }

    /* reading */
    .bg-reading {
        background-color: #3B1BBA;
    }
    .bg-reading-tag, .bg-reading-tag svg * {
        background-color: #d8d1f1;
        color: #3B1BBA;
        fill: #3B1BBA;
    }
    .border-reading, .radio-reading {
        border-color: #3B1BBA;
        accent-color: #3B1BBA
    }

    /* writing */
    .bg-writing {
        background-color: #d35924;
    }
    .bg-writing-tag, .bg-writing-tag svg * {
        background-color: #f6ded3;
        color: #D35924;
        fill: #D35924;
    }
    .border-writing, .radio-writing {
        border-color: #D35924;
        accent-color: #D35924
    }
</style>

<body>
    <div id="app">
        <div class="w-full h-full bg-app">

            <learn-page :user="{{ json_encode(Auth::user()) }}" :query ="{{ json_encode(['levelName' => $levelName ?? '', 'levelId' => $levelId ?? '', 'skill' => $skill ?? '']) }}"/>
        </div>

    </div>
    @include('layouts.script')
</body>

</html>
