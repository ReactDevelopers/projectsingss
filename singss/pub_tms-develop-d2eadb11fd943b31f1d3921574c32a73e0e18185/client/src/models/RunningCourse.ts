export interface RunningCourseProps {

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
    dates?: Array<object>;
    available_slots: number | null;
    closing_date: Date | null;
    assessment_end_date: Date | null;
    course_id: number | null;
    vendor: string;

    categoies: Function;
    categoiesSelect: Function;
}

export default class RunningCourse implements  RunningCourseProps {
    
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
    available_slots: number | null;
    closing_date: Date | null;
    assessment_end_date: Date | null;
    course_id: number | null;
    vendor: string;
    
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
}