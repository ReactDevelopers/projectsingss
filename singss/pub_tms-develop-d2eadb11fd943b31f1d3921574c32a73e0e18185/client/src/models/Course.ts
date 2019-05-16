export interface CourseProps {

    title: string;
    id: number;
    description: string;
    target_group: string;
    duration_in_day: number;
    duration_in_hour: number;
    website: string;
    remark: string;
    special_requirement: string;
    pre_requisite: string;
    created_at: Date | null;
    updated_at: Date | null;
    deleted_at: Date | null;
    duration?: number;
    category: string;

    categoies: Function;
    categoiesSelect: Function;
    getJson: Function;
}

export default class Course implements  CourseProps {
    
    title: string;
    id: number;
    description: string;
    target_group: string;
    duration_in_day: number;
    duration_in_hour: number;
    website: string;
    remark: string;
    special_requirement: string;
    pre_requisite: string;
    created_at: Date | null;
    updated_at: Date | null;
    deleted_at: Date | null;
    duration?: number;
    category: string;

    categoies(): Array<string> {

        return [
            'Soft Skill',
            'Safety',
            'Adhoc',
            'Foundation Program',
            'Induction Program',
            'WSQ',
            'Procurement',
            'Uncategorised'
            ];
    }

    categoiesSelect(): Array<object> {

        let categorySelect: Array<object> = [];
        this.categoies().map((category, categoryIndex) => {

            categorySelect.push({value: category, label: category});
        });
        return categorySelect;      
    }

    getJson() {

        return {    
            title: this.title ? this.title : '',
            id: this.id ? this.id :'',
            description: this.description ? this.description : '',
            target_group: this.target_group ? this.target_group : '',
            duration_in_day: this.duration_in_day ? this.duration_in_day : '',
            duration_in_hour: this.duration_in_hour ? this.duration_in_hour : '',
            website: this.website ? this.website : '',
            remark: this.remark ? this.remark : '',
            special_requirement: this.special_requirement ? this.special_requirement : '',
            pre_requisite: this.pre_requisite ? this.pre_requisite : ''
        }
    }
}