<style>
    #container {
        overflow: hidden;
        position: relative;
        position: fixed;
        margin-top: 100px;
        margin-left: 100px;
    }

    #hideMe {
        -webkit-animation: cssAnimation 2s forwards;
        animation: cssAnimation 2s forwards;
    }

    @keyframes cssAnimation {
        0% {
            opacity: 1;
        }

        90% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    @-webkit-keyframes cssAnimation {
        0% {
            opacity: 1;
        }

        90% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

</style>
<div>
    <div id='container'>
        <div id='hideMe'>Wait for it...</div>
    </div>
</div>
