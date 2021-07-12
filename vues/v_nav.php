<div class='text-center'>
    <img src='/public/images/banniere_sio.png' alt='Bannière du BTS SIO par Alexandre Ghio' title='Bannière du BTS SIO par Alexandre Ghio'>
</div>
<nav class="nav navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Lexique</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav justify-content-center">
            <li class="nav-item<?php
            if ($page == 'sql') {
                echo ' active';
            }
            ?>">
                <a class="nav-link" href="/sql">SQL</a>
            </li>
            <li class="nav-item<?php
            if ($page == 'c#') {
                echo ' active';
            }
            ?>">
                <a class="nav-link" href="/c-sharp">C#</a>
            </li>
            <li class="nav-item<?php
            if ($page == 'php') {
                echo ' active';
            }
            ?>">
                <a class="nav-link" href="/php">PHP</a>
            </li>
            <li class="nav-item<?php
            if ($page == 'html') {
                echo ' active';
            }
            ?>">
                <a class="nav-link" href="/html">HTML</a>
            </li>
            <li class="nav-item<?php
            if ($page == 'css') {
                echo ' active';
            }
            ?>">
                <a class="nav-link" href="/css">CSS</a>
            </li>
            <li class="nav-item<?php
            if ($page == 'js') {
                echo ' active';
            }
            ?>">
                <a class="nav-link" href="/js">JS</a>
            </li>
        </ul>
    </div>
</nav>
