export default class user{

	id: number;
	name: string;
	created_at: Date;
	updated_at: Date;
	email: string | null;
	pubnet_id: number;
	role_id: number | null;
	department_id: number | string | null;
	designation: string | null;
	division: string | null;
	section: string | null;
	branch: string | null;
}