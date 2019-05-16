import * as React from 'react';
import * as bc from 'react-bootstrap';

export default class Footer extends React.Component {

    public render() {

        let date  = new Date();
        let year = date.getFullYear();
        let copyrightMessage = 'Created By: Wong Teng Kuan (HR), Calister Hoh (HR), Saiful Shahril Saini (IS Dept).';
        return (
        <div className="footer_wrap">
        <bc.Grid>
            <bc.Row>
                <bc.Col sm={4}><p className="copyrights_para left">© {year} PUB. All rights reserved.</p></bc.Col>
                <bc.Col sm={8}>
                    <p  className="copyrights_para right">{copyrightMessage}</p>
                </bc.Col>
            </bc.Row>                   
        </bc.Grid>
        </div>
            );
    }
}