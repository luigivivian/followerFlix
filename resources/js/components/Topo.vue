<template>
    <div>
        <div id="page-header" class="bg-gradient-9">
            <div id="mobile-navigation" style="border-color: transparent;">
                <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
            </div>
            <div id="header-logo" class="logo-bg">
                <img :src="logo" style="height: 100%; width: 90%;" title="MonarchUI">
                <a id="close-sidebar" href="#" title="Close sidebar">
                    <i class="glyph-icon icon-angle-left"></i>
                </a>
            </div>

            <div id="header-nav-right">
                <a class="header-btn" id="logout-btn" v-bind:href="sair" title="Sair">
                    <i class="glyph-icon icon-linecons-lock"></i>
                </a>
            </div><!-- #header-nav-right -->

        </div>
        <div id="page-sidebar">
            <div class="scroll-sidebar">
                <ul id="sidebar-menu" class="sf-js-enabled sf-arrows">
                    <li class="header"><span>ADMINISTRATIVO</span></li>
                    <li>
                        <a href="index.html" title="Admin Dashboard">
                            <i class="glyph-icon icon-linecons-tv"></i>
                            <span>ADMIN DASHBOARD</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li class="no-menu">
                        <a href="../frontend-template/index.html" title="Frontend template">
                            <i class="glyph-icon icon-linecons-beaker"></i>
                            <span>REDFLAGS</span>
                            <span class="bs-label label-danger">
                NEW
            </span>
                        </a>
                    </li>
                    <li class="header"><span>PESSOAL</span></li>
                    <li>
                        <a href="index.html" title="Admin Dashboard">
                            <i class="glyph-icon icon-home"></i>
                            <span>INICIO</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" title="Dashboard boxes">
                            <i class="glyph-icon icon-user"></i>
                            <span>GET PROFISSIONAL</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Dashboard boxes">
                            <i class="glyph-icon icon-user"></i>
                            <span>PROFISSIONAL FILTER</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" title="Dashboard boxes">
                            <i class="glyph-icon icon-star"></i>
                            <span>MY TASKS</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Dashboard boxes">
                            <i class="glyph-icon icon-cogs"></i>
                            <span>MINHA REDE</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Dashboard boxes">
                            <i class="glyph-icon icon-money"></i>
                            <span>PAGAMENTOS</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Tutoriais para o uso da plataforma">
                            <i class="glyph-icon icon-linecons-lightbulb"></i>
                            <span>TUTORIALS</span>
                        </a>
                    </li>

                    <li class="header"><span>Extra</span></li>
                    <li>
                        <a v-bind:href="perfil" title="Pages">
                            <i class="glyph-icon icon-linecons-user"></i>
                            <span>MY PROFILE</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Pages">
                            <i class="glyph-icon icon-bullhorn"></i>
                            <span>SUPORTE</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Pages">
                            <i class="glyph-icon icon-calculator"></i>
                            <span>CALCULATOR</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['logo', 'sair', 'perfil']
    }
</script>
