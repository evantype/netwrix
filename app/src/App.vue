<template>
    <div id="app">
        <Logo/>
        <MainBoard
            types="types"
            :countries="countries"
            :states="states"
            :statuses="statuses"
            @statusChange="onStatusChange"
            @search="onSearch"
        />
        <PartnerList
            v-show="!loader"
            :status="status"
            :search="search"
            @loader="onLoadShowLoader"
            @partners="onInitPartners"
        />
        <div class="wrap-partner-list">
            <DotLoader
                v-if="loader"
                class="dot-loader"
                :loading="loader"/>
        </div>
    </div>
</template>

<script>
import Logo from '@/components/Logo/Logo.vue';
import MainBoard from '@/components/MainBoard/MainBoard.vue';
import PartnerList from '@/components/PartnerList/PartnerList.vue';
import './_App.scss';
import DotLoader from 'vue-spinner/src/DotLoader.vue';
import _ from 'lodash';


export default {
    name: 'App',
    components: {
        Logo,
        MainBoard,
        PartnerList,
        DotLoader,
    },
    data() {
        return {
            countries: [],
            states: [],
            statuses: [],
            loader: false,
            status: '',
            search: '',
        };
    },
    methods: {
        onLoadShowLoader(loader) {
            this.loader = loader;
        },
        onInitPartners(partners) {
            let arStatuses = [];
            _.forEach(partners, (partner) => {
                arStatuses.push(partner.status)
            })
            this.statuses = _.uniq(arStatuses);
        },
        onStatusChange(val) {
            this.status = val;
        },
        onSearch(val) {
            this.search = val;
        }
    },
};
</script>

<style lang="scss">
.dot-loader {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);
}
</style>