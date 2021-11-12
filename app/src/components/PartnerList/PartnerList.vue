<template>
    <div class="PartnerList">
        <div class="container" v-if="!isBlank">
            <PartnerCard
                v-for="partner in partners"
                :key="partner.id"
                :partner="partner"
                :status="status"
                :search="search"
            />
        </div>
        <div v-else>
            <p class="error-message">Your search parameters did not match any
                partners. Please try different search</p>
        </div>
    </div>
</template>

<script>
import './_PartnerList.scss';
import PartnerCard from '@/components/PartnerCard/PartnerCard';
import _ from 'lodash';

const axios = require('axios');

export default {
    name: 'PartnerList',
    props: ['status', 'search'],
    components: {
        PartnerCard,
    },
    data() {
        return {
            partners: [],
            isBlank: false,
        };
    },
    mounted() {
        this.initPartners();
    },
    methods: {
        initPartners() {
            axios.get('https://127.0.0.1:8000/partners').then((response) => {
                const self = this;
                self.$emit('loader', true);
                self.partners = response.data;
                self.$emit('partners', self.partners);
                setTimeout(() => {
                    self.$emit('loader', false);
                }, 1000);
            }).catch(function(error) {
                // todo что выводить?
                console.log(error);
            });
        },
        checkCountResultPartners() {
            this.isBlank = true;

            for (let partner of _.each(this.partners)) {
                if ((!this.search ||
                        (_.includes(partner.company, this.search) || _.includes(partner.address, this.search))) &&
                    (!status || partner.status === status)) {
                    this.isBlank = false;
                }
            }
        },
    },
    watch: {
        status: function(val) {
            const self = this;
            self.$emit('loader', true);
            self.status = val;
            self.$emit('partners', self.partners);
            setTimeout(() => {
                self.$emit('loader', false);
            }, 1000);
            this.checkCountResultPartners();
        },
        search: function() {
            this.checkCountResultPartners();
        },
    },
};
</script>
