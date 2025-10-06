<template>
    <Layout>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                    >
                        <h1 class="h2">Customer Management</h1>
                        <button class="btn btn-primary" @click="openAddModal">
                            <i class="bi bi-plus-circle"></i>
                            Tambah Customer
                        </button>
                    </div>

                    <!-- Search Bar -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input
                                    v-model="searchForm.search"
                                    @keyup.enter="search"
                                    type="text"
                                    class="form-control"
                                    placeholder="Cari customer berdasarkan nama, email, atau phone..."
                                />
                                <button
                                    class="btn btn-outline-secondary"
                                    type="button"
                                    @click="search"
                                >
                                    <i class="bi bi-search"></i>
                                </button>
                                <button
                                    v-if="searchForm.search"
                                    class="btn btn-outline-danger"
                                    type="button"
                                    @click="clearSearch"
                                >
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Customers Table -->
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="customer in customers.data"
                                            :key="customer.id"
                                        >
                                            <td>{{ customer.id }}</td>
                                            <td>{{ customer.name }}</td>
                                            <td>{{ customer.email }}</td>
                                            <td>{{ customer.phone || "-" }}</td>
                                            <td>
                                                {{ customer.address || "-" }}
                                            </td>
                                            <td>
                                                {{
                                                    formatDate(
                                                        customer.created_at
                                                    )
                                                }}
                                            </td>
                                            <td>
                                                <button
                                                    class="btn btn-sm btn-warning me-1"
                                                    @click="
                                                        openEditModal(customer)
                                                    "
                                                >
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button
                                                    class="btn btn-sm btn-danger"
                                                    @click="
                                                        openDeleteModal(
                                                            customer
                                                        )
                                                    "
                                                >
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr v-if="customers.data.length === 0">
                                            <td colspan="7" class="text-center">
                                                Tidak ada data customer
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <nav
                                v-if="
                                    customers.links &&
                                    customers.links.length > 3
                                "
                                class="mt-3"
                            >
                                <ul class="pagination justify-content-center">
                                    <li
                                        v-for="link in customers.links"
                                        :key="link.label"
                                        class="page-item"
                                        :class="{ active: link.active }"
                                    >
                                        <Link
                                            v-if="link.url"
                                            class="page-link"
                                            :href="link.url"
                                            v-html="link.label"
                                        ></Link>
                                        <span
                                            v-else
                                            class="page-link"
                                            v-html="link.label"
                                        ></span>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add/Edit Customer Modal -->
        <CustomerModal
            :show="showModal"
            :customer="selectedCustomer"
            :is-edit="isEdit"
            @close="closeModal"
            @save="handleSave"
        />

        <!-- Delete Confirmation Modal -->
        <DeleteModal
            :show="showDeleteModal"
            :customer="selectedCustomer"
            @close="closeDeleteModal"
            @confirm="handleDelete"
        />

        <!-- Success Alert Modal -->
        <SuccessAlert
            :show="showSuccessAlert"
            :message="successMessage"
            @close="closeSuccessAlert"
        />
    </Layout>
</template>

<script>
import Layout from "@/Components/Layout.vue";
import CustomerModal from "./CustomerModal.vue";
import DeleteModal from "./DeleteModal.vue";
import SuccessAlert from "@/Components/SuccessAlert.vue";
import { Link, router } from "@inertiajs/vue3";

export default {
    components: {
        Layout,
        CustomerModal,
        DeleteModal,
        SuccessAlert,
        Link,
    },
    props: {
        customers: Object,
        search: String,
    },
    data() {
        return {
            showModal: false,
            showDeleteModal: false,
            showSuccessAlert: false,
            selectedCustomer: null,
            isEdit: false,
            successMessage: "",
            searchForm: {
                search: this.search || "",
            },
        };
    },
    mounted() {
        // Check for flash messages
        if (this.$page.props.flash?.success) {
            this.showSuccessMessage(this.$page.props.flash.success);
        }
    },
    methods: {
        openAddModal() {
            this.selectedCustomer = null;
            this.isEdit = false;
            this.showModal = true;
        },
        openEditModal(customer) {
            this.selectedCustomer = { ...customer };
            this.isEdit = true;
            this.showModal = true;
        },
        openDeleteModal(customer) {
            this.selectedCustomer = customer;
            this.showDeleteModal = true;
        },
        closeModal() {
            this.showModal = false;
            this.selectedCustomer = null;
        },
        closeDeleteModal() {
            this.showDeleteModal = false;
            this.selectedCustomer = null;
        },
        closeSuccessAlert() {
            this.showSuccessAlert = false;
            this.successMessage = "";
        },
        showSuccessMessage(message) {
            this.successMessage = message;
            this.showSuccessAlert = true;
        },
        handleSave(customerData) {
            if (this.isEdit) {
                router.put(
                    `/customers/${this.selectedCustomer.id}`,
                    customerData,
                    {
                        onSuccess: () => {
                            this.closeModal();
                        },
                    }
                );
            } else {
                router.post("/customers", customerData, {
                    onSuccess: () => {
                        this.closeModal();
                    },
                });
            }
        },
        handleDelete() {
            router.delete(`/customers/${this.selectedCustomer.id}`, {
                onSuccess: () => {
                    this.closeDeleteModal();
                },
            });
        },
        search() {
            router.get(
                "/customers",
                { search: this.searchForm.search },
                {
                    preserveState: true,
                    replace: true,
                }
            );
        },
        clearSearch() {
            this.searchForm.search = "";
            this.search();
        },
        formatDate(dateString) {
            return new Date(dateString).toLocaleDateString("id-ID", {
                year: "numeric",
                month: "short",
                day: "numeric",
                hour: "2-digit",
                minute: "2-digit",
            });
        },
    },
};
</script>
