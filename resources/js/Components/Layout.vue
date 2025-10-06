<template>
    <div>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <Link class="navbar-brand" href="/">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard App
                </Link>

                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <Link
                                class="nav-link"
                                :class="{
                                    active: $page.component === 'Dashboard',
                                }"
                                href="/dashboard"
                            >
                                <i class="bi bi-house-door"></i>
                                Dashboard
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link
                                class="nav-link"
                                :class="{
                                    active:
                                        $page.component === 'Customer/Index',
                                }"
                                href="/customers"
                            >
                                <i class="bi bi-people"></i>
                                Customer
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main content -->
        <div class="main-content" style="margin-top: 76px">
            <slot></slot>
        </div>

        <!-- Global Modals -->
        <div id="global-modals"></div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
};
</script>
