import { Helmet } from 'react-helmet';
import * as React from 'react';
import AdminUrl from '../../url/AdminUrl';
import { pageInfo } from '../../app-interface';

export interface MetaProps {

    page: string;
}

export default class PageMeta extends React.Component<MetaProps> {

    public pageInfo: pageInfo;

    /**
     * In this method, we are assignin the component properties.
     * @param  props:HomeProps Interface of home
     * @return {void}
     */
    constructor(props: MetaProps) {

        super(props);
        let adminUrl = new AdminUrl();
        this.pageInfo = adminUrl.getPage(this.props.page);
    }

    /**
     * render the meta options
     */
   render() {

    return (
        <Helmet>
            <title>{this.pageInfo.title}</title>
            <meta name="title" content={this.pageInfo.metaTitle} />
            <meta name="keywords" content={this.pageInfo.metaKeywords} />
            <meta name="descriptions" content={this.pageInfo.metaDescription} />
        </Helmet>
    );

   }
}