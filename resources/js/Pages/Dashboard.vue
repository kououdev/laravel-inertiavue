<template>
    <Layout>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                    >
                        <h1 class="h2">Dashboard</h1>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body text-center">
                                    <i
                                        class="bi bi-house-door display-1 text-primary mb-3"
                                    ></i>
                                    <h3 class="card-title">
                                        Welcome to Dashboard Page
                                    </h3>
                                    <p class="card-text">
                                        Selamat datang di halaman dashboard
                                        aplikasi.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="row mt-4">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div
                                class="card border-left-primary shadow h-100 py-2"
                            >
                                <div class="card-body">
                                    <div
                                        class="row no-gutters align-items-center"
                                    >
                                        <div class="col mr-2">
                                            <div
                                                class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                                            >
                                                Total Customers
                                            </div>
                                            <div
                                                class="h5 mb-0 font-weight-bold text-gray-800"
                                            >
                                                {{ totalCustomers }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i
                                                class="bi bi-people fs-2 text-gray-300"
                                            ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div
                                class="card border-left-success shadow h-100 py-2"
                            >
                                <div class="card-body">
                                    <div
                                        class="row no-gutters align-items-center"
                                    >
                                        <div class="col mr-2">
                                            <div
                                                class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                            >
                                                Active Today
                                            </div>
                                            <div
                                                class="h5 mb-0 font-weight-bold text-gray-800"
                                            >
                                                24
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i
                                                class="bi bi-activity fs-2 text-gray-300"
                                            ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Components/Layout.vue";

export default {
    components: {
        Layout,
    },
    props: {
        totalCustomers: {
            type: Number,
            default: 0,
        },
    },
};
</script>
