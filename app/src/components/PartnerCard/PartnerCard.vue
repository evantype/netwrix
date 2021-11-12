<template>
    <div class="PartnerCard" v-if="checkStatus(status) && checkSearch(search)">
        <div class="partner-logo">
            <img :src="partner.logo" width="95" height="76" alt="distributor">
        </div>
        <div class="partner-info">
            <h3 class="partner-info__title">{{ partner.company }}</h3>
            <p class="partner-info__location">{{ partner.address }}</p>
        </div>
        <div class="partner-contact">
            <a :href="partner.website" class="partner-contact__site">Website</a>
            <span class="partner-contact__phone">{{ partner.phone }}</span>
        </div>
        <div class="partner-status"><span>{{ partner.status }}</span></div>
    </div>
</template>

<script>
import './_PartnerCard.scss';
import _ from 'lodash';

export default {
    name: 'PartnerCard',
    props: [
        'partner',
        'status',
        'search',
    ],
    data() {
        return {};
    },
    methods: {
        checkSearch(search) {
            if (!search ||
                (_.includes(this.partner.company, search) || _.includes(this.partner.address, search))) {
                return true;
            }
        },
        checkStatus(status) {
            if (!status || this.partner.status === status) {
                return true;
            }
        }
    },
};
</script>
